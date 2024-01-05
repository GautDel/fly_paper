<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumPost extends Model
{
    protected $fillable = [
        'title',
        'body',
        'votes',
        'slug',
        'user_id',
        'forum_section_id'
    ];

    public static function findBySlug(string $slug) {

        $post = ForumPost::where('slug', $slug)->first();

        return $post;
    }
    public static function findNewest(int $amount) {

        $posts = ForumPost::latest()->take($amount)->get();

        return $posts;
    }

    public static function findNewestBySection(int $amount, int $sectionId) {

        $posts = ForumPost::where('forum_section_id', $sectionId)->take($amount)->get();

        return $posts;
    }

    public function forumSection(): BelongsTo {
        return $this->belongsTo(ForumSection::class);
    }

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }

    public function forumPostComments(): HasMany {

        return $this->hasMany(ForumPostComment::class);
    }

    public function forumPostVotes(): HasMany {

        return $this->hasMany(ForumPostVote::class);
    }

    public function likedByUser() {

        return $vote = $this->forumPostVotes()->where('user_id', Auth::user()->id);
    }

    public function countVotes(int $id) {
        $post = ForumPost::find($id);
        $upvotes = $post->forumPostVotes()->where('upvote', '=', true)->count();
        $downvotes = $post->forumPostVotes()->where('upvote', '=', false)->count();
        $votes = $upvotes - $downvotes;
        return $votes;
    }
}

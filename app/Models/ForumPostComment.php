<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class ForumPostComment extends Model
{
    protected $fillable = [
        'comment',
        'forum_post_id',
        'user_id'
    ];

    public function forumPostCommentVotes(): HasMany {

        return $this->hasMany(ForumPostCommentVote::class);
    }

    public  function forumPost(): BelongsTo {

        return $this->belongsTo(ForumPost::class);
    }

    public  function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }

    public function likedByUser() {

        return $vote = $this->forumPostCommentVotes()->where('user_id', Auth::user()->id);
    }


    public function countVotes(int $id) {
        $comment = ForumPostComment::find($id);
        $upvotes = $comment->forumPostCommentVotes()->where('upvote', '=', true)->count();
        $downvotes = $comment->forumPostCommentVotes()->where('upvote', '=', false)->count();
        $votes = $upvotes - $downvotes;
        return $votes;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function forumSection(): BelongsTo {
        return $this->belongsTo(ForumSection::class);
    }

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }

    public  function forumPostComments(): HasMany {

        return $this->hasMany(ForumPostComment::class);
    }
}

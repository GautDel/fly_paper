<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForumPost extends Model
{
    use HasFactory;

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
}

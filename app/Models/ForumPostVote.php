<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPostVote extends Model {

    protected $fillable = [
        'upvote',
        'forum_post_id',
        'user_id'
    ];

    public function forumPost() {
        return $this->belongsTo(ForumPost::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

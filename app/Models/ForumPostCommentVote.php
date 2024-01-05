<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPostCommentVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'upvote',
        'forum_post_comment_id',
        'user_id'
    ];

    public function forumPostComment() {
        return $this->belongsTo(ForumPostComment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

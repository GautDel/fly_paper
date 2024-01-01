<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForumPostComment extends Model
{
    protected $fillable = [
        'comment',
        'forum_post_id',
        'user_id'
    ];


    public  function forumPost(): BelongsTo {

        return $this->belongsTo(ForumPost::class);
    }

    public  function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }

}

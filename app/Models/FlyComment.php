<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlyComment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'comment',
        'fly_id',
        'user_id'
    ];

    public function fly()
    {

        return $this->belongsTo(Fly::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

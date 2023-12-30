<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Fly extends Model
{
    public static function findAll() {

        return  DB::table('flies')->get();
    }

    public static function findOne(int $id) {

        $fly = Fly::find($id);
        return $fly;
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(FlyCategories::class, 'fly_fly_category', 'fly_id', 'fly_category_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(FlyComment::class);
    }

    public static function findComments(int $id) {

        $fly = Fly::find($id);
        $comments = $fly->comments;
        return $comments;
    }
}

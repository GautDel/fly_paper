<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Fly extends Model
{

    protected $fillable = [
        'name',
        'description',
        'fish_species',
        'tying',
        'tactics',
        'image',
        'fly_category_id'
    ];

    public static function findOne(int $id) {

        $fly = Fly::find($id);
        return $fly;
    }

    public function category(): BelongsTo {
        return $this->belongsTo(FlyCategories::class, 'fly_category_id', 'id');
    }

    public function comments(): HasMany {
        return $this->hasMany(FlyComment::class);
    }

    public static function findComments(int $id) {

        $fly = Fly::find($id);
        $comments = $fly->comments;
        return $comments;
    }

    public function getImage() {
        return Storage::url($this->image);
    }
}

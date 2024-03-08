<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FlyCategories extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function findAll() {

        $categories = FlyCategories::get();
        return $categories;
    }

    public function flies():BelongsToMany {
        return $this->belongsToMany(Fly::class, 'fly_fly_category', 'fly_category_id', 'fly_id');
    }
}

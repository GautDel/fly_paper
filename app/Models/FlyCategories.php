<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class FlyCategories extends Model
{
    use HasFactory;

    public static function findOne(int $id) {

        $category = FlyCategories::find($id);
        return $category;
    }

    public static function findAll() {

        $categories = FlyCategories::get();
        return $categories;
    }

    public static function findByCat(int $id) {

        $category = FlyCategories::find($id);
        $flies = $category->flies;
        return $flies;
    }

    public function flies():BelongsToMany {
        return $this->belongsToMany(Fly::class, 'fly_fly_category', 'fly_category_id', 'fly_id');
    }
}

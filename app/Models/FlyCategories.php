<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlyCategories extends Model
{
    use HasFactory;

    public static function findOne(int $id) {

        $category = DB::table('fly_categories')->find($id);
        return $category;
    }

    public static function findAll() {

        $categories = DB::table('fly_categories')->get();
        return $categories;
    }
}

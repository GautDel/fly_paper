<?php

namespace App\Http\Controllers;

use App\Models\FlyCategories;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public static function render() {

        $categories = ProductCategory::get();

        $fly_categories = FlyCategories::pluck('name');

        return view('market', [
                    'fly_categories' => $fly_categories,
                    'categories' => $categories,
                ]);
    }

    public static function getProduct() {
        return view('product');
    }
}

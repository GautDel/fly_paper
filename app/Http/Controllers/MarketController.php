<?php

namespace App\Http\Controllers;

use App\Models\FlyCategories;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public static function render() {
        $fly_categories = FlyCategories::pluck('name');
        return view('market', ['fly_categories' => $fly_categories]);
    }

    public static function getProduct() {
        return view('product');
    }
}

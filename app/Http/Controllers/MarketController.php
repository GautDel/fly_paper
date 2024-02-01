<?php

namespace App\Http\Controllers;

use App\Models\FlyCategories;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public static function render() {

        $categories = ProductCategory::get();

        $fly_categories = FlyCategories::pluck('name');
        $products = Product::where('product_category_id', 5)->get();

        return view('market', [
                    'fly_categories' => $fly_categories,
                    'categories' => $categories,
                    'products' => $products,
                ]);
    }

    public static function getProduct() {
        return view('product');
    }

    public static function getProductsByCategory(Request $request) {

        $products = Product::where('product_category_id', $request->id)->get();
        return response()->json(['products' => $products]);
    }

    public static function getProducts(Request $request) {

        $products = Product::get();
        return response()->json(['products' => $products]);
    }

    public static function getProductsByPrice(Request $request) {

        return response()->json(['products' => $products]);
    }

}

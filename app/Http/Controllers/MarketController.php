<?php

namespace App\Http\Controllers;

use App\Models\FlyCategories;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public static function render() {

        $categories = ProductCategory::get();
        $init = 5;

        $products = Product::where('product_category_id', $init)->get();

        $totals = DB::table('products')
                            ->where('product_category_id', $init)
                            ->selectRaw('count(in_stock or null) as in_stock')
                            ->selectRaw('count(new or null) as new')
                            ->selectRaw('count(sale or null) as sale')
                            ->first();

        return view('market', [
                    'categories' => $categories,
                    'products' => $products,
                    'totals' => $totals
        ]);
    }

    public static function countProducts(Request $request) {

        if($request->id === 'all') {
            $totals = DB::table('products')
                            ->selectRaw('count(in_stock or null) as in_stock')
                            ->selectRaw('count(new or null) as new')
                            ->selectRaw('count(sale or null) as sale')
                            ->first();

            return response()->json(['totals' => $totals]);
        }

        $totals = DB::table('products')
                            ->where('product_category_id', $request->id)
                            ->selectRaw('count(in_stock or null) as in_stock')
                            ->selectRaw('count(new or null) as new')
                            ->selectRaw('count(sale or null) as sale')
                            ->first();

        return response()->json(['totals' => $totals]);
    }

    public static function getProduct() {
        return view('product');
    }

    public static function getProductsByCategory(Request $request) {

        $products = Product::where('product_category_id', $request->id)->get();

        return response()->json(['products' => $products]);
    }

    public static function getProductsByAvailability(Request $request) {

        $in_stock = $request->in_stock;
        $new = $request->new;
        $sale = $request->sale;

        if($request->category === 'all') {
            $products = Product::when($in_stock, function($query, $in_stock) {
                return $query->where('in_stock', $in_stock);
            })->when($new, function($query, $new) {
                return $query->where('new', $new);
            })->when($sale, function($query, $sale) {
                return $query->where('sale', $sale);
            })->get();

            return response()->json(['products' => $products]);
        }

        $products = Product::where('product_category_id', $request->category)
        ->when($in_stock, function($query, $in_stock) {
            return $query->where('in_stock', $in_stock);
        })->when($new, function($query, $new) {
            return $query->where('new', $new);
        })->when($sale, function($query, $sale) {
            return $query->where('sale', $sale);
        })->get();

        return response()->json(['products' => $products]);
    }

    public static function getProducts(Request $request) {

        $products = Product::get();

        return response()->json(['products' => $products]);
    }

    public static function getProductsByPrice(Request $request) {

        if($request->category === 'all') {
            $products = Product::where('price', '>', $request->minPrice)
                                 ->where('price', '<', $request->maxPrice)
                                 ->get();

            return response()->json(['products' => $products]);
        }

        $products = Product::where('product_category_id',  $request->category)
                             ->where('price', '>', $request->minPrice)
                             ->where('price', '<', $request->maxPrice)
                             ->get();

        return response()->json(['products' => $products]);

    }

    public static function getProductsBySearch(Request $request) {

        $products = Product::where('name','LIKE','%'.$request->search."%")->get();

        return response()->json(['products' => $products]);
    }
}

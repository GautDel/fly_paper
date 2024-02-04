<?php

namespace App\Http\Controllers;

use App\Models\FlyCategories;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use App\Models\VariationOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\CliArguments\Builder;

class MarketController extends Controller
{
    public static function render()
    {

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

    public static function countProducts(Request $request)
    {

        if ($request->id === 'all') {
            $totals = DB::table('products')
                ->selectRaw('count(in_stock or null) as in_stock')
                ->selectRaw('count(new or null) as new')
                ->selectRaw('count(sale or null) as sale')
                ->first();

            return $totals;
        }

        $totals = DB::table('products')
            ->where('product_category_id', $request->id)
            ->selectRaw('count(in_stock or null) as in_stock')
            ->selectRaw('count(new or null) as new')
            ->selectRaw('count(sale or null) as sale')
            ->first();

        return $totals;
    }

    public static function getProduct()
    {

        return view('product');
    }

    public static function getOptions($variations) {

        $options = [];

        foreach ($variations as $variation) {
            foreach($variation->options as $option)
                array_push($options, $option);
        };

        return $options;
    }

    public static function getProductsByCategory(Request $request)
    {


        $products = Product::where('product_category_id', $request->id)->get();
        $variations = ProductVariation::where('product_category_id', $request->id)->get();

        $totals = self::countProducts($request);

        return response()->json([
            'products' => $products,
            'variations' => $variations,
            'options' => self::getOptions($variations),
            'totals' => $totals,
        ]);
    }

    public static function getProductsByFilter(Request $request)
    {

        if ($request->category === 'search') {
            $products = Product::when($request->in_stock, function ($query) use ($request) {
                return $query->where('in_stock', $request->in_stock)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->when($request->new, function ($query) use ($request) {
                return $query->where('new', $request->new)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->when($request->sale, function ($query) use ($request) {
                return $query->where('sale', $request->sale)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->when(!$request->in_stock, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->when(!$request->new, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->when(!$request->sale, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice)
                    ->where('name', 'LIKE', '%' . $request->search . "%");
            })->get();

            $totals = [
                'in_stock' => $products->where('in_stock', true)->count(),
                'new' => $products->where('new', true)->count(),
                'sale' => $products->where('sale', true)->count()
            ];

            return response()->json([
                'products' => $products,
                'totals' => $totals
            ]);
        }
        if ($request->category === 'all') {
            $products = Product::when($request->in_stock, function ($query) use ($request) {
                return $query->where('in_stock', $request->in_stock)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when($request->new, function ($query) use ($request) {
                return $query->where('new', $request->new)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when($request->sale, function ($query) use ($request) {
                return $query->where('sale', $request->sale)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->in_stock, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->new, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->sale, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->get();

            $totals = [
                'in_stock' => $products->where('in_stock', true)->count(),
                'new' => $products->where('new', true)->count(),
                'sale' => $products->where('sale', true)->count()
            ];

            return response()->json([
                'products' => $products,
                'totals' => $totals
            ]);
        }

        $products = Product::where('product_category_id', $request->category)
            ->when($request->in_stock, function ($query) use ($request) {
                return $query->where('in_stock', $request->in_stock)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when($request->new, function ($query) use ($request) {
                return $query->where('new', $request->new)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when($request->sale, function ($query) use ($request) {
                return $query->where('sale', $request->sale)
                    ->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->in_stock, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->new, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->when(!$request->sale, function ($query) use ($request) {
                return $query->where('price', '>', $request->minPrice)
                    ->where('price', '<', $request->maxPrice);
            })->get();

        $variations = ProductVariation::where('product_category_id', $request->category)->get();

        $totals = [
            'in_stock' => $products->where('in_stock', true)->count(),
            'new' => $products->where('new', true)->count(),
            'sale' => $products->where('sale', true)->count()
        ];

        return response()->json([
            'products' => $products,
            'variations' => $variations,
            'options' => self::getOptions($variations),
            'totals' => $totals
        ]);
    }

    public static function getProducts(Request $request)
    {

        $products = Product::get();

        $totals = self::countProducts($request);

        return response()->json([
            'products' => $products,
            'totals' => $totals
        ]);
    }
}

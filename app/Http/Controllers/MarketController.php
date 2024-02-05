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

    public static function getRatings($products) {
        $ratings = [];
        foreach($products as $product) {
            foreach($product->ratings as $rating) {
                array_push($ratings, $rating);
            }
        }
    }

    public static function getProductData($productData) {
        $products = [];

        foreach($productData as $product) {
                array_push($products, [
                        'product' => $product,
                        'avgRating' => $product->avgRating($product->id)
                ]);
        };

        return $products;
    }

    public static function getProductsByCategory(Request $request)
    {

        $productData = Product::where('product_category_id', $request->id)
                                ->with('ratings')
                                ->get();


        $variations = ProductVariation::where('product_category_id', $request->id)->get();

        $totals = self::countProducts($request);

        return response()->json([
            'products' => self::getProductData($productData),
            'variations' => $variations,
            'totals' => $totals,
        ]);
    }

    public static function getProductsByFilter(Request $request)
    {
        if ($request->category === 'search') {
            $productData = Product::when($request->in_stock, function ($query) use ($request) {
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
            })->with('ratings')->get();

            $totals = [
                'in_stock' => $productData->where('in_stock', true)->count(),
                'new' => $productData->where('new', true)->count(),
                'sale' => $productData->where('sale', true)->count()
            ];

            if($request->minRating !== null) {

                $filtered = [];
                foreach($productData as $product) {
                    $avg = $product->ratings->avg('rating');

                    if($avg > $request->minRating && $avg < $request->maxRating) {
                    array_push($filtered, $product);
                    }
                }

                return response()->json([
                    'products' => self::getProductData($filtered),
                    'totals' => $totals
                ]);
            }


            return response()->json([
                'products' => self::getProductData($productData),
                'totals' => $totals
            ]);
        }

        if ($request->category === 'all') {
            $productData = Product::when($request->in_stock, function ($query) use ($request) {
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
            })->with('ratings')->get();

            $totals = [
                'in_stock' => $productData->where('in_stock', true)->count(),
                'new' => $productData->where('new', true)->count(),
                'sale' => $productData->where('sale', true)->count()
            ];

            if($request->minRating !== null) {

                $filtered = [];
                foreach($productData as $product) {
                    $avg = $product->ratings->avg('rating');

                    if($avg > $request->minRating && $avg < $request->maxRating) {
                    array_push($filtered, $product);
                    }
                }

                return response()->json([
                    'products' => self::getProductData($filtered),
                    'totals' => $totals
                ]);
            }

            return response()->json([
                'products' => self::getProductData($productData),
                'totals' => $totals
            ]);
        }

        $productData = Product::where('product_category_id', $request->category)
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
            })->with('ratings')->get();

        $variations = ProductVariation::where('product_category_id', $request->category)->get();

        $totals = [
            'in_stock' => $productData->where('in_stock', true)->count(),
            'new' => $productData->where('new', true)->count(),
            'sale' => $productData->where('sale', true)->count()
        ];

        if($request->minRating !== null) {

            $filtered = [];
            foreach($productData as $product) {
                $avg = $product->ratings->avg('rating');

                if($avg > $request->minRating && $avg < $request->maxRating) {
                    array_push($filtered, $product);
                }
            }

            return response()->json([
                'products' => self::getProductData($filtered),
                'variations' => $variations,
                'options' => self::getOptions($variations),
                'totals' => $totals
            ]);
        }

        return response()->json([
            'products' => self::getProductData($productData),
            'variations' => $variations,
            'options' => self::getOptions($variations),
            'totals' => $totals
        ]);
    }

    public static function getProducts(Request $request)
    {

        $productData = Product::with('ratings')->get();

        $totals = self::countProducts($request);

        return response()->json([
            'products' => self::getProductData($productData),
            'totals' => $totals
        ]);
    }
}

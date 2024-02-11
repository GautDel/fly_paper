<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductEntry;
use App\Models\ProductVariation;
use App\Models\ProductVariationOption;
use App\Models\VariantOption;
use App\Models\VariationOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public static function getProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->with('ratings')->first();
        $variations = ProductVariation::where('product_category_id', $product->product_category_id)
                                        ->with('options')->get();

        return view('product', [
            'product' => $product,
            'variations' => $variations,
        ]);
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

        $totals = self::countProducts($request);

        return response()->json([
            'products' => self::getProductData($productData),
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

                $filtered = collect([]);

                foreach($productData as $product) {
                    $avg = $product->ratings->avg('rating');

                    if($avg > $request->minRating && $avg < $request->maxRating) {
                        $filtered->push($product);
                    }
                }

                $filteredTotals = [
                    'in_stock' => $filtered->where('in_stock', true)->count(),
                    'new' => $filtered->where('new', true)->count(),
                    'sale' => $filtered->where('sale', true)->count()
                ];


                return response()->json([
                    'products' => self::getProductData($filtered),
                    'totals' => $filteredTotals
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


                $filtered = collect([]);

                foreach($productData as $product) {
                    $avg = $product->ratings->avg('rating');

                    if($avg > $request->minRating && $avg < $request->maxRating) {
                        $filtered->push($product);
                    }
                }

            $filteredTotals = [
                'in_stock' => $filtered->where('in_stock', true)->count(),
                'new' => $filtered->where('new', true)->count(),
                'sale' => $filtered->where('sale', true)->count()
            ];


                return response()->json([
                    'products' => self::getProductData($filtered),
                    'totals' => $filteredTotals
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

        $totals = [
            'in_stock' => $productData->where('in_stock', true)->count(),
            'new' => $productData->where('new', true)->count(),
            'sale' => $productData->where('sale', true)->count()
        ];

        if($request->minRating !== null) {

            $filtered = collect([]);

            foreach($productData as $product) {
                $avg = $product->ratings->avg('rating');

                if($avg > $request->minRating && $avg < $request->maxRating) {
                    $filtered->push($product);
                }
            }

            $filteredTotals = [
                'in_stock' => $filtered->where('in_stock', true)->count(),
                'new' => $filtered->where('new', true)->count(),
                'sale' => $filtered->where('sale', true)->count()
            ];


            return response()->json([
                'products' => self::getProductData($filtered),
                'totals' => $filteredTotals
            ]);
        }

        return response()->json([
            'products' => self::getProductData($productData),
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

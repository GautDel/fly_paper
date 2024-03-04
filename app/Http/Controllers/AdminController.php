<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariantOption;
use App\Models\ProductVariation;
use App\Models\VariationOption;
use Validator;
use App\Models\ProductCategory;
use App\Models\ProductEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public static function render()
    {

        if (Auth::user()->type === 'admin') {

            $categories = ProductCategory::get();
            $variations = ProductVariation::with('category')->with('options')->get();
            $products = Product::get();


            return view('admin', [
                'variations' => $variations,
                'categories' => $categories,
                'products' => $products,
            ]);
        } else {
            abort(401);
        }
    }

    public static function addCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }


        ProductCategory::create([
            'name' => $request->name,
            'parent_category_id' => $request->parent_category_id,
        ]);

        return redirect("/admin")->with('message', 'Category added successfully');
    }

    public static function addOption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $value = $request->value;
        if(str_contains($request->value, ' ')) {
            $value = str_replace(' ', '_', $value);
        }

        VariationOption::create([
            'value' => $value,
            'product_variation_id' => $request->product_variation_id,
        ]);

        return redirect("/admin")->with('message', 'Option added successfully');
    }


    public static function addVariation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }


        ProductVariation::create([
            'name' => $request->name,
            'product_category_id' => $request->product_category_id,
        ]);

        return redirect("/admin")->with('message', 'Variation added successfully');
    }

    public static function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:1000',
            'image' => 'image',
            'price' => 'required',
            'brand' => 'required|min:5|max:255',
            'product_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $path = $request->file('image')->store('public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'price' => $request->price,
            'in_stock' => boolval($request->in_stock),
            'new' => boolval($request->new),
            'sale' => boolval($request->sale),
            'brand' => $request->brand,
            'product_category_id' => $request->product_category,
        ]);

        return redirect("/admin")->with('message', 'Product added successfully');
    }

    public static function selectProduct(Request $request)
    {
        $product = Product::where('id', $request->product_id)->with('category')->first();
        $data = [
            'message' => "Product $product->id selected",
            'product' => $product
        ];

        return redirect("/admin")->with($data);
    }

    public static function selectProductEntry(Request $request)
    {
        $product = Product::where('id', $request->product_id)->with('category')->first();
        $productEntries = ProductEntry::where('product_id', $product->id)->get();
        $data = [
            'message' => "Product $product->id selected",
            'product_entry' => $product,
            'product_entries' => $productEntries
        ];

        return redirect("/admin")->with($data);
    }

    public static function addProductOptions(Request $request)
    {

        $data = [];
        foreach ($request->all() as $key => $option) {
            if (str_contains($key, 'option_')) {
                $data[] = [
                    'product_id' => $request->product_id,
                    'variation_option_id' => $option,
                    'prod_opt_id' => "$request->product_id-$option"
                ];
            } else {
                continue;
            }
        }
        ProductVariantOption::upsert(
            $data,
            ['prod_opt_id'],
            ['product_id', 'variation_option_id', 'prod_opt_id']
        );
        return redirect("/admin")->with('message', 'Individual Product Options added successfully');
    }


    public static function addProductEntry(Request $request) {
        $sku = "$request->product_id";
        $qty = $request->quantity;

        if($request->quantity === null) {
            $qty = 0;
        }

        foreach($request->all() as $key => $option) {
            if(str_contains($key, 'option') === true) {
                $sku = $sku.'-'.$option;
            }
        }

        ProductEntry::create([
            'product_id' => $request->product_id,
            'sku' => $sku,
            'qty' => $qty
        ]);

        return redirect("/admin")->with('message', 'Product Entry created');
    }
}

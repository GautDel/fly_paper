<?php

namespace App\Http\Controllers;

use App\Models\FishSpecies;
use App\Models\FishSpeciesCategory;
use App\Models\Fly;
use App\Models\FlyCategories;
use App\Models\Material;
use App\Models\MaterialCategory;
use App\Models\Product;
use App\Models\ProductImage;
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
            $flyCategories = FlyCategories::get();
            $flies = Fly::get();
            $materialCategories = MaterialCategory::get();
            $materials = Material::get();
            $fishSpeciesCategories = FishSpeciesCategory::get();
            $fishSpecies = FishSpecies::get();


            return view('admin', [
                'variations' => $variations,
                'categories' => $categories,
                'products' => $products,
                'flyCategories' => $flyCategories,
                'flies' => $flies,
                'materialCategories' => $materialCategories,
                'materials' => $materials,
                'fishSpeciesCategories' => $fishSpeciesCategories,
                'fishSpecies' => $fishSpecies,
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
            'images[]' => 'image',
            'price' => 'required',
            'brand' => 'required|min:5|max:255',
            'product_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $request->file('image')->store('public');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
            'in_stock' => boolval($request->in_stock),
            'new' => boolval($request->new),
            'sale' => boolval($request->sale),
            'brand' => $request->brand,
            'product_category_id' => $request->product_category,
        ]);

        $imagesPath = [];

        foreach($request->file('images') as $image) {
            $imagesPath[] = [
                'product_id' => $product->id,
                'image' => $image->store('public')
            ];
        }

        ProductImage::insert($imagesPath);

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

    public static function addFly(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'fish_species' => 'required|min:5|max:1000',
            'tying' => 'required|min:5|max:1000',
            'tactics' => 'required|min:5|max:1000',
            'image' => 'image',
            'fly_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $request->file('image')->store('public');

        Fly::create([
            'name' => $request->name,
            'description' => $request->fly_description,
            'fish_species' => $request->fish_species,
            'tying' => $request->tying,
            'tactics' => $request->tactics,
            'image' => $imagePath,
            'fly_category_id' => $request->fly_category
        ]);


        return redirect("/admin")->with('message', 'Wiki Entry [FLY] created');
    }

    public static function addFlyCategory(Request $request) {

        $validator = Validator::make($request->all(), [
            'fly_category_name' => 'required|min:5|max:100',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        FlyCategories::create([
            'name' => $request->fly_category_name,
        ]);


        return redirect("/admin")->with('message', 'Fly Category created');
    }

    public static function addMaterialCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'material_category_name' => 'required|min:5|max:100',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        MaterialCategory::create([
            'name' => $request->material_category_name,
        ]);


        return redirect("/admin")->with('message', 'Material Category created');
    }

    public static function addMaterial(Request $request) {

        $validator = Validator::make($request->all(), [
            'material_name' => 'required|min:5|max:100',
            'material_description' => 'required|min:5|max:1000',
            'material_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $request->file('material_image')->store('public');

        Material::create([
            'name' => $request->material_name,
            'description' => $request->material_description,
            'image' => $imagePath,
            'material_category_id' => $request->material_category,
        ]);


        return redirect("/admin")->with('message', 'Material Category created');
    }

    public static function addFishSpeciesCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'fish_species_category_name' => 'required|min:5|max:100',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        FishSpeciesCategory::create([
            'name' => $request->fish_species_category_name,
        ]);


        return redirect("/admin")->with('message', 'Fish Species Category created');
    }

    public static function addFishSpecies(Request $request) {

        $validator = Validator::make($request->all(), [
            'fish_species_name' => 'required|min:5|max:100',
            'fish_species_description' => 'required|min:5|max:1000',
            'fish_species_category' => 'required',
            'fish_species_tactics' => 'required|min:5|max:1000',
            'fish_species_water' => 'required|min:5|max:1000',
            'fish_species_environment' => 'required|min:5|max:1000',
            'fish_species_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect("/admin")
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $request->file('fish_species_image')->store('public');

        FishSpecies::create([
            'name' => $request->fish_species_name,
            'description' => $request->fish_species_description,
            'fish_species_category_id' => $request->fish_species_category,
            'tactics' => $request->fish_species_tactics,
            'water' => $request->fish_species_water,
            'environment' => $request->fish_species_environment,
            'image' => $imagePath,
        ]);


        return redirect("/admin")->with('message', 'Fish Species created');
    }
}

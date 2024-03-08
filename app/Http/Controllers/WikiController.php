<?php

namespace App\Http\Controllers;

use App\Models\FishSpecies;
use App\Models\FishSpeciesCategory;
use App\Models\Fly;
use App\Models\FlyCategories;
use App\Models\Material;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class WikiController extends Controller
{

    public static function render()
    {
        $flies = Fly::get();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        return view('wiki', [
            'flies' => $flies,
            'flyCategories' => $flyCategories,
            'materialCategories' => $MaterialCategories,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getFliesByCat(Request $request)
    {
        $flies = Fly::where('fly_category_id', $request->category)->get();
        $category = FlyCategories::where('id', $request->category)->first();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        return view('wiki', [
            'flies' => $flies,
            'flyCategories' => $flyCategories,
            'chosenCategory' => $category,
            'materialCategories' => $MaterialCategories,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getMaterialsByCat(Request $request)
    {
        $materials = Material::where('material_category_id', $request->category)->get();
        $category = MaterialCategory::where('id', $request->category)->first();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        return view('wiki', [
            'flyCategories' => $flyCategories,
            'chosenCategory' => $category,
            'materialCategories' => $MaterialCategories,
            'materials' => $materials,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getFishSpeciesByCat(Request $request)
    {
        $fishSpecies = FishSpecies::where('fish_species_category_id', $request->category)->get();
        $category = MaterialCategory::where('id', $request->category)->first();
        $flyCategories = FlyCategories::get();
        $materialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        return view('wiki', [
            'flyCategories' => $flyCategories,
            'chosenCategory' => $category,
            'materialCategories' => $materialCategories,
            'fishSpecies' => $fishSpecies,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getAll()
    {
        $flies = Fly::get();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = MaterialCategory::get();

        return view('wiki', [
            'flies' => $flies,
            'flyCategories' => $flyCategories,
            'materialCategories' => $MaterialCategories,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getAllMaterials()
    {
        $materials = Material::get();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = MaterialCategory::get();

        return view('wiki', [
            'materials' => $materials,
            'flyCategories' => $flyCategories,
            'materialCategories' => $MaterialCategories,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getAllFishSpecies()
    {
        $fishSpecies = FishSpecies::get();
        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        return view('wiki', [
            'fishSpecies' => $fishSpecies,
            'flyCategories' => $flyCategories,
            'materialCategories' => $MaterialCategories,
            'fishSpeciesCategories' => $fishSpeciesCategories,
        ]);
    }

    public static function getMaterial(Request $request)
    {
        $material = Material::where('id', $request->id)->with('category')->first();
        return view('material', [
            'material' => $material,
        ]);
    }

    public static function getFishSpecies(Request $request)
    {
        $fishSpecies = FishSpecies::where('id', $request->id)->with('category')->first();

        return view('fish_species', [
            'fishSpecies' => $fishSpecies,
        ]);
    }

    public static function search(Request $request)
    {

        $flyCategories = FlyCategories::get();
        $MaterialCategories = MaterialCategory::get();
        $fishSpeciesCategories = FishSpeciesCategory::get();

        if (!$request->search) {
            $search = Fly::get();

            return view('wiki', [
                'flies' => $search,
                'flyCategories' => $flyCategories,
                'materialCategories' => $MaterialCategories,
                'fishSpeciesCategories' => $fishSpeciesCategories,
            ]);
        }

        if ($request->category === 'FLIES') {
            $search = Fly::where('name', 'LIKE', '%' . $request->search . "%")
                ->get();

            return view('wiki', [
                'flies' => $search,
                'flyCategories' => $flyCategories,
                'materialCategories' => $MaterialCategories,
                'fishSpeciesCategories' => $fishSpeciesCategories,
            ]);
        }

        if ($request->category === 'MATERIALS') {
            $search = Material::where('name', 'LIKE', '%' . $request->search . "%")
                ->get();

            return view('wiki', [
                'materials' => $search,
                'flyCategories' => $flyCategories,
                'materialCategories' => $MaterialCategories,
                'fishSpeciesCategories' => $fishSpeciesCategories,
            ]);
        }

        if ($request->category === 'FISH_SPECIES') {
            $search = Material::where('name', 'LIKE', '%' . $request->search . "%")
                ->get();

            return view('wiki', [
                'materials' => $search,
                'flyCategories' => $flyCategories,
                'materialCategories' => $MaterialCategories,
                'fishSpeciesCategories' => $fishSpeciesCategories,
            ]);
        }

    }
}

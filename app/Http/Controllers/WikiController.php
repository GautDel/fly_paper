<?php

namespace App\Http\Controllers;

use App\Models\Fly;
use App\Models\FlyCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WikiController extends Controller {


    public static function getByCat(string $cat) {
        $flies = FlyCategories::findByCat(intval($cat));
        $category = FlyCategories::findOne($cat);
        return view('wiki', [
            'flies' => $flies,
            'category' => $category->name,
        ]);
    }

    public static function getAll() {
        $flies = FlyCategories::findAllFlies();
        return view('wiki', [
            'flies' => $flies,
        ]);

    }

    public static function render () {
        $flies = Fly::findAll();

        return view('wiki', ['flies' => $flies,
        ]);
    }
}

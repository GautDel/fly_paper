<?php

namespace App\Http\Controllers;

use App\Models\Fly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WikiController extends Controller {


    public static function render () {
        $flies = Fly::findAll();
        return view('wiki', ['flies' => $flies]);
    }
}

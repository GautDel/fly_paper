<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Slug extends Controller
{
    public static function create($str, $delimiter = '_') {

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

        return $slug;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function render()
    {
        $categories = ProductCategory::get();

        return view('test', ['categories' => $categories]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function render()
    {
        return view('test');
    }

    public function render2()
    {
        $data = "This is some data";
        return response()->json(['data' => $data], 200);
    }
}

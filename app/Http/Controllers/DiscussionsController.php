<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public static function render() {
        return view('discussions');
    }
}

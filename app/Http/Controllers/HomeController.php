<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public static function render() {

        $posts = ForumPost::findNewest(6);


        return view('home', ['posts' => $posts]);
    }
}

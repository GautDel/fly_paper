<?php

namespace App\Http\Controllers;

use App\Models\FishLog;
use App\Models\ForumPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public static function render() {

        $posts = ForumPost::findNewest(6);
        $log = FishLog::latest()->first();

        return view('home', [
            'posts' => $posts,
            'log' => $log
        ]);
    }
}

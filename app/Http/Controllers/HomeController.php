<?php

namespace App\Http\Controllers;

use App\Models\FishLog;
use App\Models\ForumPost;

class HomeController extends Controller
{

    public static function render() {

        $posts = ForumPost::findNewest(6);
        $log = FishLog::latest()
                        ->where('visibility', 0)
                        ->first();

        return view('home', [
            'posts' => $posts,
            'log' => $log
        ]);
    }
}

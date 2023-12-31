<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\ForumSection;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public static function render() {
        $sections = ForumSection::findAll();

        return view('discussions', ['sections' => $sections]);
    }

    public static function getBySlug(Request $request) {

        $section = ForumSection::findBySlug($request->segment(count($request->segments())));

        return view('discussionSection', [
            'section' => $section->section,
            'slug' => $section->slug,
            'posts' => $section->posts
        ]);
    }

    public static function getPost(Request $request) {

        $post = ForumPost::findBySlug($request->segment(count($request->segments())));

        return view('discussionPost', ['post' => $post]);
    }
}

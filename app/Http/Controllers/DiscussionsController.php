<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\ForumPost;
use App\Models\ForumPostComment;
use App\Models\ForumSection;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public static function render() {
        $sections = ForumSection::findAll();

        return view('discussions', ['sections' => $sections]);
    }

    public static function getCreatePostView() {
        $sections = ForumSection::findAll();

        return view('createDiscussionPost', ['sections' => $sections]);
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

     public function storePost(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:1000',
            'slug' => 'required|min:5|max:255',
            'user_id' => 'required',
            'forum_section_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("/discussions/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        ForumPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $request->slug,
            'user_id' => $request->user_id,
            'forum_section_id' => $request->forum_section_id,
        ]);

        return redirect("/discussions/create");
    }


    public function storeComment(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:5|max:250',
            'forum_post_id' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("/discussions/$request->category/$request->slug#text")
                        ->withErrors($validator)
                        ->withInput();
        }

        ForumPostComment::create([
            'comment' => $request->comment,
            'forum_post_id' => $request->forum_post_id,
            'user_id' => $request->user_id
        ]);

        return redirect("/discussions/$request->category/$request->slug#text");
    }

    public static function destroyComment(Request $request) {

        ForumPostComment::destroy($request->id);

        return redirect("/discussions/$request->category/$request->slug#text");
    }

    public static function updateComment(Request $request) {

        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:5|max:250',
        ]);

        if ($validator->fails()) {
            return redirect("/discussions/$request->category/$request->slug#text")
                        ->withErrors($validator)
                        ->withInput();
        }

        $comment = ForumPostComment::find($request->id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect("/discussions/$request->category/$request->slug#text");
    }

}

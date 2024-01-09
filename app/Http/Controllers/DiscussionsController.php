<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\ForumPost;
use App\Models\ForumPostComment;
use App\Models\ForumPostCommentVote;
use App\Models\ForumPostVote;
use App\Models\ForumSection;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public static function render() {
        $sections = ForumSection::findAll();

        if($sections === null) {

            return view('errors.404');
        }

        return view('discussions', [
            'sections' => $sections,
        ]);
    }

    public static function getCreatePostView() {

        $sections = ForumSection::findAll();

        return view('createDiscussionPost', ['sections' => $sections]);
    }

    public static function getUpdatePostView(Request $request) {

        $post = ForumPost::find($request->id);
        $sections = ForumSection::findAll();

        return view('updateDiscussionPost',[
            'post' => $post,
            'sections' => $sections,
        ]);
    }

    public static function getBySlug(Request $request) {

        $section = ForumSection::findBySlug($request->segment(count($request->segments())));

        if($section === null) {

            return view('errors.404');
        }

        return view('discussionSection', [
            'section' => $section->section,
            'slug' => $section->slug,
            'posts' => $section->posts
        ]);
    }

    public static function getPost(Request $request) {

        $post = ForumPost::findBySlug($request->segment(count($request->segments())));

        if($post === null) {

            return view('errors.404');
        }

        return view('discussionPost', ['post' => $post]);
    }

    public function storePost(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:1000',
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
            'slug' => Slug::create($request->title),
            'user_id' => $request->user_id,
            'forum_section_id' => $request->forum_section_id,
        ]);

        $category = ForumSection::find($request->forum_section_id);
        $slug = Slug::create($request->title);

        return redirect("/discussions/$category->slug/$slug");
    }

    public static function destroyPost(Request $request) {

        ForumPost::destroy($request->id);
        return redirect("/discussions/$request->category")
                ->with('success', 'Post was successfully deleted');
    }

    public static function updatePost(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:1000',
            'user_id' => 'required',
            'forum_section_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("/discussions/update")
                        ->withErrors($validator)
                        ->withInput();
        }

        $post = ForumPost::find($request->id);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Slug::create($request->title),
            'user_id' => $request->user_id,
            'forum_section_id' => $request->forum_section_id,
        ]);

        $category = ForumSection::find($request->forum_section_id);
        $slug = Slug::create($request->title);

        return redirect("/discussions/$category->slug/$slug");
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

        $post = ForumPost::find($request->id);
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

    public static function upvotePost(Request $request) {

        $vote = ForumPostVote::updateOrInsert([
            'forum_post_id' => $request->forum_post_id,
            'user_id' => $request->user_id
        ],
        [
            'upvote' => filter_var($request->upvote, FILTER_VALIDATE_BOOLEAN),
            'forum_post_id' => $request->forum_post_id,
            'user_id' => $request->user_id
        ]);

        $post = ForumPost::find($vote->first()->forum_post_id);

        return response()->json([
            'votes' => $post->countVotes($post->id),
        ], 200);
    }

    public static function upvoteComment(Request $request) {

        $vote = ForumPostCommentVote::updateOrInsert([
            'forum_post_comment_id' => $request->forum_post_comment_id,
            'user_id' => $request->user_id
        ],
        [
            'upvote' => filter_var($request->upvote, FILTER_VALIDATE_BOOLEAN),
            'forum_post_comment_id' => $request->forum_post_comment_id,
            'user_id' => $request->user_id
        ]);

        $comment = ForumPostComment::find($vote->first()->forum_post_comment_id);

        return response()->json([
            'votes' => $comment->countVotes($comment->id)
        ], 200);
    }
}

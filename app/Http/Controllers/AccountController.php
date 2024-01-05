<?php

namespace App\Http\Controllers;

use App\Models\FlyComment;
use App\Models\ForumPost;
use App\Models\ForumPostComment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private static function getUser() {

        return Auth::user();
    }

    public static function render() {

        $user = AccountController::getUser();
        $posts = ForumPost::where('user_id', $user->id)->get();

        return view('account', [
            'username' => $user->name,
            'email' => $user->email,
            'about' => $user->about,
            'flyComments' => $user->flyComments,
            'postComments' => $user->forumPostComments,
            'posts' => $posts
        ]);
    }

    public static function destroyFlyComment(Request $request) {

        FlyComment::destroy($request->id);

        return redirect("/account");
    }

    public static function destroyPostComment(Request $request) {

        ForumPostComment::destroy($request->id);

        return redirect("/account");
    }
}

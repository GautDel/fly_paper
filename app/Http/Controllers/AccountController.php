<?php

namespace App\Http\Controllers;

use App\Models\FlyComment;
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

        return view('account', [
            'username' => $user->name,
            'email' => $user->email,
            'about' => $user->about,
            'flyComments' => $user->flyComments
        ]);
    }

    public static function destroyFlyComment(Request $request) {

        FlyComment::destroy($request->id);

        return redirect("/account");
    }
}

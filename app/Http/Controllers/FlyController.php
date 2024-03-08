<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Fly;
use App\Models\FlyComment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FlyController extends Controller {


    public function render(string $id) {

        $fly = Fly::where('id', $id)->with('category')->first();
        $comments = Fly::findComments($id);

        return view('fly', [
            'fly' => $fly,
            'comments' => $comments,
        ]);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:5|max:250',
            'fly_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("wiki/fly/$request->fly_id#text")
                        ->withErrors($validator)
                        ->withInput();
        }

        FlyComment::create([
            'comment' => $request->comment,
            'fly_id' => $request->fly_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect("wiki/fly/$request->fly_id#text");
    }

    public static function destroy(Request $request) {

        FlyComment::destroy($request->id);

        return redirect("wiki/fly/$request->fly_id#text");
    }

    public static function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:5|max:250',
        ]);

        if ($validator->fails()) {
            return redirect("wiki/fly/$request->fly_id#text")
                        ->withErrors($validator)
                        ->withInput();
        }

        $comment = FlyComment::find($request->id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect("wiki/fly/$request->fly_id#text");
    }
}

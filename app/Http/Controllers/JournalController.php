<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function render(Request $request) {

        $notes = Note::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        return view('journal', ['notes' => $notes]);
    }

    public static function storeNote(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:50',
            'body' => 'required|min:5|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $note = Note::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        $notes = Note::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(8)->get();

        return response()->json(['notes' => $notes], 200);
    }
}

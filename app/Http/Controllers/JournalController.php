<?php

namespace App\Http\Controllers;

use App\Models\FishLog;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    public static function render() {

        $notes = Note::where('user_id', Auth::user()->id)
                       ->orderBy('created_at', 'desc')
                       ->paginate(8);

        $logs = FishLog::where('user_id', Auth::user()->id)
                         ->orderBy('created_at', 'desc')
                         ->paginate(5);

        $options = config('logFormOptions');

        $fly_categories = DB::table('fly_categories')->get();

        return view('journal',
            [
                'notes' => $notes,
                'logs' => $logs,
                'options' => $options,
                'flyCategories' => $fly_categories
            ]);
    }

    public static function getAllLogs() {
        $logs = FishLog::where('visibility', 0)->get();

        return view('logs', ['logs' => $logs]);
    }

    public static function getUpdateLogView(Request $request) {

        $log = FishLog::where('id', $request->id)->first();

        $options = config('logFormOptions');

        $fly_categories = DB::table('fly_categories')->get();

        return view('updateLog',
            [
                'log' => $log,
                'options' => $options,
                'flyCategories' => $fly_categories
            ]);
    }

    public static function storeNote(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:50',
            'body' => 'required|min:5|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        Note::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);


        return response()->json(200);
    }

    public static function destroyNote(Request $request) {
        $note = Note::destroy($request->id);

        return response()->json(200);
    }

    public static function getNotes(Request $request) {

        $notes = Note::where('user_id', Auth::user()->id)
                       ->orderBy('created_at', 'desc')
                       ->take(8)
                       ->get();

        return response()->json(["notes" => $notes], 200);
    }

    public static function storeLog(Request $request) {

        $options = config('logFormOptions');

        $fly_categories = DB::table('fly_categories')->pluck('name');

        $visibility = 0;
        if($request->visibility === 'true') {
            $visibility = 1;
        } else if($request->visibility === 'false') {
            $visibility = 0;
        }
        $validator = Validator::make($request->all(), [
            'fish' => 'required|min:5|max:100',
            'image' => 'required|image',
            'weight' => 'required|numeric',
            'mass_unit' => ['required', Rule::in($options['mass_units'])],
            'fish_length' => 'required|numeric',
            'length_unit' => ['required', Rule::in($options['length_units'])],
            'rod' => 'required|min:2|max:50',
            'rod_length' => ['required', Rule::in($options['rod_lengths'])],
            'rod_weight' => ['required', Rule::in($options['rod_weights'])],
            'reel' => 'required|min:2|max:50',
            'reel_weight' => ['required', Rule::in($options['reel_weights'])],
            'line' => 'required|min:2|max:75',
            'line_type' => ['required', Rule::in($options['line_types'])],
            'line_weight' => ['required', Rule::in($options['line_weights'])],
            'tippet' => 'required|min:2|max:50',
            'tippet_weight' => ['required', Rule::in($options['tippet_weights'])],
            'fly' => 'required|min:2|max:50',
            'fly_category' => ['required', Rule::in($fly_categories)],
            'hook_size' => ['required', Rule::in($options['hook_sizes'])],
            'location' => 'required|min:2|max:100',
            'weather' => ['required', Rule::in($options['weathers'])],
            'day_time' => ['required', Rule::in($options['day_times'])],
            'water_clarity' => 'required|min:2|max:50',
            'water_movement' => 'required|min:2|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $path = $request->file('image')->store('public');

        $log = FishLog::create([
            'fish' => $request->fish,
            'image' => $path,
            'weight' => $request->weight,
            'mass_unit' => $request->mass_unit,
            'fish_length' => $request->fish_length,
            'length_unit' => $request->length_unit,
            'rod' => $request->rod,
            'rod_length' => $request->rod_length,
            'rod_weight' => $request->rod_weight,
            'reel' => $request->reel,
            'reel_weight' => $request->reel_weight,
            'line' => $request->line,
            'line_type' => $request->line_type,
            'line_weight' => $request->line_weight,
            'tippet' => $request->tippet,
            'tippet_weight' => $request->tippet_weight,
            'fly' => $request->fly,
            'fly_category' => $request->fly_category,
            'hook_size' => $request->hook_size,
            'location' => $request->location,
            'weather' => $request->weather,
            'day_time' => $request->day_time,
            'precise_time' => $request->precise_time,
            'water_clarity' => $request->water_clarity,
            'water_movement' => $request->water_movement,
            'visibility' => $visibility,
            'note' => $request->note,
            'user_id' => Auth::user()->id
        ]);



        return response()->json(['redirect' => $log->id],200);
    }

    public static function updateLog(Request $request) {

        $options = config('logFormOptions');

        $fly_categories = DB::table('fly_categories')->pluck('name');

        $validator = $request->validate([
            'fish' => 'required|min:5|max:100',
            'weight' => 'required|numeric',
            'mass_unit' => ['required', Rule::in($options['mass_units'])],
            'fish_length' => 'required|numeric',
            'length_unit' => ['required', Rule::in($options['length_units'])],
            'rod' => 'required|min:2|max:50',
            'rod_length' => ['required', Rule::in($options['rod_lengths'])],
            'rod_weight' => ['required', Rule::in($options['rod_weights'])],
            'reel' => 'required|min:2|max:50',
            'reel_weight' => ['required', Rule::in($options['reel_weights'])],
            'line' => 'required|min:2|max:75',
            'line_type' => ['required', Rule::in($options['line_types'])],
            'line_weight' => ['required', Rule::in($options['line_weights'])],
            'tippet' => 'required|min:2|max:50',
            'tippet_weight' => ['required', Rule::in($options['tippet_weights'])],
            'fly' => 'required|min:2|max:50',
            'fly_category' => ['required', Rule::in($fly_categories)],
            'hook_size' => ['required', Rule::in($options['hook_sizes'])],
            'location' => 'max:100',
            'weather' => ['required', Rule::in($options['weathers'])],
            'day_time' => ['required', Rule::in($options['day_times'])],
            'water_clarity' => 'required|min:2|max:50',
            'water_movement' => 'required|min:2|max:50',
            'note' => 'required|min:5|max:500',
        ]);

        $log = FishLog::where('user_id', Auth::user()->id)
                ->where('id', $request->id)
                ->update([
            'fish' => $request->fish,
            'weight' => $request->weight,
            'mass_unit' => $request->mass_unit,
            'fish_length' => $request->fish_length,
            'length_unit' => $request->length_unit,
            'rod' => $request->rod,
            'rod_length' => $request->rod_length,
            'rod_weight' => $request->rod_weight,
            'reel' => $request->reel,
            'reel_weight' => $request->reel_weight,
            'line' => $request->line,
            'line_type' => $request->line_type,
            'line_weight' => $request->line_weight,
            'tippet' => $request->tippet,
            'tippet_weight' => $request->tippet_weight,
            'fly' => $request->fly,
            'fly_category' => $request->fly_category,
            'hook_size' => $request->hook_size,
            'location' => $request->location,
            'weather' => $request->weather,
            'day_time' => $request->day_time,
            'precise_time' => $request->precise_time,
            'water_clarity' => $request->water_clarity,
            'water_movement' => $request->water_movement,
            'note' => $request->note,
            'user_id' => Auth::user()->id
        ]);

        if($log === null) {
            return view('errors.404');
        }

        return redirect("/journal/$request->id");
    }

    public static function destroyLog(Request $request) {

        FishLog::where('id', $request->id)->delete();

        return response()->json(["message" => 'Successfully deleted log'], 200);
    }


    public static function getLog(Request $request) {

        $log = FishLog::where('id', $request->id)->first();

        if($log === null) {
            return view('errors.404');
        }

        return view('log', ['log' => $log]);
    }

}

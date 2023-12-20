<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Joke extends Model
{
    use HasFactory;

    public static function one(int $id) {

        $joke = DB::table('jokes')->find($id);

        return $joke;
    }
}

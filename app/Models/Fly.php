<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fly extends Model
{
    use HasFactory;

    public static function findAll() {

        $flies = DB::table('flies')->get();
        return $flies;
    }

    public static function findOne(int $id) {

        $flies = DB::table('flies')->find($id);
        return $flies;
    }
}

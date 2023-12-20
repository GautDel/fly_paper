<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OneLiner extends Model
{
    use HasFactory;

    public static function one(int $id) {

         $oneLiner = DB::table('one_liners')->find($id);

        return $oneLiner;
    }
}

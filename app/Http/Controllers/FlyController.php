<?php

namespace App\Http\Controllers;

use App\Models\Fly;
use Illuminate\Http\Request;

class FlyController extends Controller {

    public function render(string $id) {

        $fly = Fly::findOne($id);

        return view('fly', ['fly' => $fly]);
    }
}

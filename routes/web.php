<?php

use App\Http\Controllers\FlyController;
use App\Http\Controllers\WikiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/discussions', [WikiController::class, 'render']);
Route::get('/wiki', [WikiController::class, 'render']);
Route::get('/market', [WikiController::class, 'render']);
Route::get('/account', [WikiController::class, 'render']);

Route::get('/fly/{id}', [FlyController::class, 'render']);

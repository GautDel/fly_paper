<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\FlyController;
use App\Http\Controllers\MarketController;
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

// DISCUSSION ROUTES
Route::get('/discussions', [DiscussionsController::class, 'render']);

// DISCUSSION POST ROUTES
Route::get('/discussions/create', [DiscussionsController::class, 'getCreatePostView'])->middleware('auth');
Route::post('/discussions/create', [DiscussionsController::class, 'storePost'])->middleware('auth');

Route::get('/discussions/{slug}', [DiscussionsController::class, 'getBySlug']);
Route::get('/discussions/{section}/{slug}', [DiscussionsController::class, 'getPost']);

// DISCUSSION COMMENT ROUTES
Route::post('/discussions/postcomment/create', [DiscussionsController::class, 'storeComment'])->middleware('auth');
Route::put('/discussions/postcomment/update', [DiscussionsController::class, 'updateComment'])->middleware('auth');
Route::delete('/discussions/postcomment/delete', [DiscussionsController::class, 'destroyComment'])->middleware('auth');

// WIKI ROUTES
Route::get('/wiki', [WikiController::class, 'render']);
Route::get('/wiki/flies', [WikiController::class, 'render']);
Route::get('/wiki/flies/{category}', [WikiController::class, 'getByCat']);
Route::get('/wiki/fly/{id}', [FlyController::class, 'render']);

// FLY COMMENT ROUTES
Route::post('/flycomment/create', [FlyController::class, 'store'])->middleware('auth');;
Route::delete('/flycomment/delete', [FlyController::class, 'destroy'])->middleware('auth');
Route::put('/flycomment/update', [FlyController::class, 'update'])->middleware('auth');

// MARKET ROUTES
Route::get('/market', [MarketController::class, 'render']);

// ACCOUNT ROUTES
Route::get('/account', [AccountController::class, 'render'])->middleware('auth');
Route::delete('/account/fly_comment/delete', [AccountController::class, 'destroyFlyComment'])->middleware('auth');

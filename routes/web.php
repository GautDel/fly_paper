<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\FlyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WikiController;
use App\View\Components\Discussions\PostVote;
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

Route::get('/', [HomeController::class, 'render']);

// DISCUSSION ROUTES
Route::get('/discussions', [DiscussionsController::class, 'render']);

// DISCUSSION POST ROUTES
Route::get('/discussions/create', [DiscussionsController::class, 'getCreatePostView'])->middleware('auth');
Route::post('/discussions/create', [DiscussionsController::class, 'storePost'])->middleware('auth');
Route::post('/discussions/update', [DiscussionsController::class, 'getUpdatePostView'])->middleware('auth');
Route::put('/discussions/update', [DiscussionsController::class, 'updatePost'])->middleware('auth');
Route::delete('/discussions/delete', [DiscussionsController::class, 'destroyPost'])->middleware('auth');

Route::put('/discussions/upvote', [DiscussionsController::class, 'upvotePost'])->middleware('auth');

Route::get('/discussions/{slug}', [DiscussionsController::class, 'getBySlug']);
Route::get('/discussions/{section}/{slug}', [DiscussionsController::class, 'getPost']);

// DISCUSSION COMMENT ROUTES
Route::post('/discussions/postcomment/create', [DiscussionsController::class, 'storeComment'])->middleware('auth');
Route::put('/discussions/postcomment/update', [DiscussionsController::class, 'updateComment'])->middleware('auth');
Route::delete('/discussions/postcomment/delete', [DiscussionsController::class, 'destroyComment'])->middleware('auth');

Route::put('/discussions/postcomment/upvote', [DiscussionsController::class, 'upvoteComment'])->middleware('auth');

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
Route::post('/market', [MarketController::class, 'getProducts']);
Route::post('/market/category', [MarketController::class, 'getProductsByCategory']);
Route::post('/market/availability', [MarketController::class, 'getProductsByAvailability']);
Route::post('/market/price', [MarketController::class, 'getProductsByPrice']);
Route::post('/market/count', [MarketController::class, 'countProducts']);
Route::post('/market/search', [MarketController::class, 'getProductsBySearch']);
Route::get('/market/product', [MarketController::class, 'getProduct']);

// ACCOUNT ROUTES
Route::get('/account', [AccountController::class, 'render'])->middleware('auth');
Route::delete('/account/fly_comment/delete', [AccountController::class, 'destroyFlyComment'])->middleware('auth');
Route::delete('/account/post_comment/delete', [AccountController::class, 'destroyPostComment'])->middleware('auth');


// JOURNAL ROUTES
Route::get('/journal', [JournalController::class, 'render'])->middleware('auth');

// NOTE ROUTES
Route::get('/journal/notes', [JournalController::class, 'getNotes'])->middleware('auth');
Route::post('/journal/notes', [JournalController::class, 'storeNote'])->middleware('auth');
Route::delete('/journal/notes', [JournalController::class, 'destroyNote'])->middleware('auth');

// LOG ROUTES
Route::post('/journal/logs', [JournalController::class, 'storeLog'])->middleware('auth');
Route::delete('/journal/logs', [JournalController::class, 'destroyLog'])->middleware('auth');
Route::get('/journal/logs/update', [JournalController::class, 'getUpdateLogView'])->middleware('auth');
Route::put('/journal/logs', [JournalController::class, 'updateLog'])->middleware('auth');
Route::get('/journal/{id}', [JournalController::class, 'getLog']);

// TEST ROUTE
Route::get('/test', [TestController::class, 'render']);
Route::get('/test2', [TestController::class, 'render2']);

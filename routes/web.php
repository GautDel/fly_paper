<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\FlyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\TestController;
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

Route::get('/', [HomeController::class, 'render']);

// DISCUSSION ROUTES
Route::get('/discussions', [DiscussionsController::class, 'render']);

// DISCUSSION POST ROUTES
Route::get('/discussions/create', [DiscussionsController::class, 'getCreatePostView'])->middleware('auth');
Route::post('/discussions/create', [DiscussionsController::class, 'storePost'])->middleware('auth');
Route::put('/discussion/update/{id}', [DiscussionsController::class, 'updatePost'])->middleware('auth');
Route::get('/discussion/update/{id}', [DiscussionsController::class, 'getUpdatePostView'])->middleware('auth');
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
Route::get('/wiki/flies', [WikiController::class, 'getAll']);
Route::get('/wiki/flies/{category}', [WikiController::class, 'getFliesByCat']);
Route::post('/wiki/search', [WikiController::class, 'search']);
Route::get('/wiki/fly/{id}', [FlyController::class, 'render']);
Route::get('/wiki/materials', [WikiController::class, 'getAllMaterials']);
Route::get('/wiki/materials/{category}', [WikiController::class, 'getMaterialsByCat']);
Route::get('/wiki/material/{id}', [WikiController::class, 'getMaterial']);
Route::get('/wiki/fish_species', [WikiController::class, 'getAllFishSpecies']);
Route::get('/wiki/fish_species/{category}', [WikiController::class, 'getFishSpeciesByCat']);
Route::get('/wiki/species/{id}', [WikiController::class, 'getFishSpecies']);


// FLY COMMENT ROUTES
Route::post('/flycomment/create', [FlyController::class, 'store'])->middleware('auth');;
Route::delete('/flycomment/delete', [FlyController::class, 'destroy'])->middleware('auth');
Route::put('/flycomment/update', [FlyController::class, 'update'])->middleware('auth');

// MARKET ROUTES
Route::get('/market', [MarketController::class, 'render']);
Route::post('/market', [MarketController::class, 'getProducts']);
Route::post('/market/category', [MarketController::class, 'getProductsByCategory']);
Route::post('/market/filter', [MarketController::class, 'getProductsByFilter']);
Route::get('/market/product/{id}', [MarketController::class, 'getProduct']);
Route::post('/market/availability', [MarketController::class, 'checkAvailability'])->middleware('auth');
Route::post('/market/cart', [CartController::class, 'cart'])->middleware('auth');
Route::get('/market/rating/{id}', [CartController::class, 'rating'])->middleware('auth');
Route::post('/market/rating/{id}', [CartController::class, 'addRating'])->middleware('auth');

// CART ROUTES
Route::get('/cart', [CartController::class, 'render'])->middleware('auth');
Route::get('/cart/shipping', [CartController::class, 'shippingView'])->middleware('auth');
Route::get('/cart/checkout', [CartController::class, 'checkoutView'])->middleware('auth');
Route::post('/cart/checkout', [CartController::class, 'checkoutView'])->middleware('auth');
Route::put('/cart/update', [CartController::class, 'updateCart'])->middleware('auth');
Route::post('/cart/address', [CartController::class, 'createAddress'])->middleware('auth');
Route::delete('/cart/delete', [CartController::class, 'destroyItem'])->middleware('auth');

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
Route::get('/logs', [JournalController::class, 'getAllLogs']);
Route::post('/journal/logs', [JournalController::class, 'storeLog'])->middleware('auth');
Route::delete('/journal/logs', [JournalController::class, 'destroyLog'])->middleware('auth');
Route::get('/journal/logs/update', [JournalController::class, 'getUpdateLogView'])->middleware('auth');
Route::put('/journal/logs', [JournalController::class, 'updateLog'])->middleware('auth');
Route::get('/journal/{id}', [JournalController::class, 'getLog']);

// STRIPE
Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth');
Route::get('/checkout', [CartController::class, 'checkoutView'])->middleware('auth');
Route::get('/checkout/success', [CartController::class, 'success'])->middleware('auth');
Route::get('/checkout/cancel', [CartController::class, 'cancel'])->middleware('auth');

// ADMIN
Route::get('/admin', [AdminController::class, 'render'])->middleware('auth');
Route::post('/admin/add_product', [AdminController::class, 'addProduct'])->middleware('auth');
Route::post('/admin/add_category', [AdminController::class, 'addCategory'])->middleware('auth');
Route::post('/admin/add_variation', [AdminController::class, 'addVariation'])->middleware('auth');
Route::post('/admin/add_option', [AdminController::class, 'addOption'])->middleware('auth');
Route::post('/admin/select_product', [AdminController::class, 'selectProduct'])->middleware('auth');
Route::post('/admin/add_product_options', [AdminController::class, 'addProductOptions'])->middleware('auth');
Route::post('/admin/select_product_entry', [AdminController::class, 'selectProductEntry'])->middleware('auth');
Route::post('/admin/add_product_entries', [AdminController::class, 'addProductEntry'])->middleware('auth');
Route::post('/admin/add_fly', [AdminController::class, 'addFly']);
Route::post('/admin/add_fly_category', [AdminController::class, 'addFlyCategory']);
Route::post('/admin/add_material_category', [AdminController::class, 'addMaterialCategory']);
Route::post('/admin/add_material', [AdminController::class, 'addMaterial']);
Route::post('/admin/add_fish_species_category', [AdminController::class, 'addFishSpeciesCategory']);
Route::post('/admin/add_fish_species', [AdminController::class, 'addFishSpecies']);

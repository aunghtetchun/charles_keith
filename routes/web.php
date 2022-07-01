<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(\App\Http\Controllers\PageController::class)->group(function(){
    Route::get("/","index")->name("index");
    Route::get("/about","about")->name("about");
    Route::get("/games","games")->name("games");
    Route::get("/game/{slug}","gameDetail")->name("game.detail");
    Route::get("/blog","blog")->name("blog");
    Route::get("/catalog/{slug}","catlogDetail")->name("cat.detail");
    Route::get("/catalog/item/{id}","itemDetail")->name("cat.show");
    Route::get("/catlog/search/","search")->name("cat.search");

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::resource('category',\App\Http\Controllers\CategoryController::class);
    Route::resource('post',\App\Http\Controllers\PostController::class);
    Route::resource('photo',\App\Http\Controllers\PhotoController::class);
    Route::resource('game',\App\Http\Controllers\GameController::class);
    Route::resource('currency',\App\Http\Controllers\CurrencyController::class);
    Route::resource('stock',\App\Http\Controllers\StockController::class);
});


Route::get("test",function (){
    $files = Storage::allFiles("public");
//    array_shift($files);
    return $files;
});


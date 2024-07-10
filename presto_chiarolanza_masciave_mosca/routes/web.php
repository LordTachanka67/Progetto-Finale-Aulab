<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

/* ROTTE PER CATEGORIE */
/* route::get('/categories/create',[ArticleController::class,'createCategory'])->name('categories.create'); */

Route::middleware(['auth'])->group(function () {
    Route::controller(ArticleController::class)->prefix('articles')->group(function () {
        Route::get('/create', 'create')->name('articles.create');
        Route::post('/store', 'store')->name('articles.store');
    });   
});
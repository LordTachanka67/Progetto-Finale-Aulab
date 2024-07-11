<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/',[PublicController::class , 'homepage'])->name('homepage');

/* ROTTE PER CATEGORIE */
/* route::get('/categories/create',[ArticleController::class,'createCategory'])->name('categories.create'); */

Route::get('/categories/{category}', [CategoryController::class, 'byCategory'])->name('categories.byCategory');

/* ROTTE PER ARTICOLI */
Route::middleware(['auth'])->group(function () {
    Route::controller(ArticleController::class)->prefix('articles')->group(function () {
        Route::get('/create', 'create')->name('articles.create');
        Route::post('/store', 'store')->name('articles.store');
    });   
});

Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

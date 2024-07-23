<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RevisorController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

/* PUBLIC */
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// TEAM
Route::get('/team', [PublicController::class, 'team'])->name('team');

/* RICERCA */
Route::get('/search', [PublicController::class, 'searchArticles'])->name('articles.searched');

/* CAMBIO LINGUA */
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// SOCIAL
Route::get('/instagram', [PublicController::class, 'instagram'])->name('instagram');

Route::get('/user/{user}', [PublicController::class, 'showUser'])->name('show.user');

/* ROTTE PER CATEGORIE */
/* route::get('/categories/create',[ArticleController::class,'createCategory'])->name('categories.create'); */

Route::get('/categories/{category}', [CategoryController::class, 'byCategory'])->name('categories.byCategory');

/* ROTTE PER ARTICOLI */
Route::middleware(['auth'])->group(function () {
    Route::controller(ArticleController::class)->prefix('articles')->group(function () {
        Route::get('/create', 'create')->name('articles.create');
        Route::post('/store', 'store')->name('articles.store');
        Route::post('/preferiti/{article}', 'favourites')->name('articles.favourites');
        Route::post('/nopreferiti/{article}', 'unfavourites')->name('articles.unfavourites');
    });
});

Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


// Lavora con noi
Route::get('/lavora-con-noi', [MailController::class, 'revisorForm'])->name('revisorForm')->middleware('auth');
Route::POST('/lavora-con-noi/invia', [MailController::class, 'revisorApplication'])->name('revisorApplication')->middleware('auth');

/* REVISORE */
Route::middleware(['auth', 'isRevisor'])->group(function () {
    Route::get('/make/revisor{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
    Route::get('/reject/revisor{user}', [RevisorController::class, 'rejectRevisor'])->name('reject.revisor');
    Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::get('/revisor/{article}', [RevisorController::class, 'show'])->name('revisor.show');

    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('article.reject');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('article.accept');
    Route::patch('/cancel', [RevisorController::class, 'cancel'])->name('article.cancel');
});


/* DASHBOARD UTENTE */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/preferiti', [DashboardController::class, 'preferiti'])->name('dashboard.preferiti');
    Route::get('/dashboard/recensioni', [DashboardController::class, 'feedbacks'])->name('dashboard.feedbacks');
    Route::get('/dashboard/carrello', [DashboardController::class, 'cart'])->name('dashboard.cart');
    Route::get('/dashboard/{article}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{article}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{article}/update', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{article}/destroy', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
});

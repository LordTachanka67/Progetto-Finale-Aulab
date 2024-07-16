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


// Lavora con noi
Route::get('/lavora-con-noi', [MailController::class, 'revisorForm'])->name('revisorForm')->middleware('auth');
Route::POST('/lavora-con-noi/invia', [MailController::class, 'revisorApplication'])->name('revisorApplication')->middleware('auth');

/* REVISORE */
Route::middleware(['auth','isRevisor'])->group(function () {
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
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{article}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{article}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{article}/update', [DashboardController::class, 'update'])->name('dashboard.update');
});

/* RICERCA */
Route::get('/search', [PublicController::class, 'searchArticles'])->name('articles.searched');
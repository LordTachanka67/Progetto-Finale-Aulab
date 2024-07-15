<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Register any application services.
    */
    public function register(): void
    {
        //
    }
    
    /**
    * Bootstrap any application services.
    */
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            $categories = Category::orderBy('name')->get();
            View::share('categories', $categories);
        }
        Paginator::useBootstrap();
        
        $revisor_pending_number = count(Article::where('is_accepted', null)->get());
        View::share('revisor_pending_number', $revisor_pending_number);
    }
}
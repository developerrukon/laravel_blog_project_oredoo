<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        $categories = Category::latest('created_at')->select('name','slug','image')->take(5)->get();
        view()->share('categories', $categories);
    }
}

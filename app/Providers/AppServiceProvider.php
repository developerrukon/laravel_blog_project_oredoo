<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
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
        $categories = Category::where('parent_id', null)->select('name','slug','image')->take(3)->get();
        view()->share('categories', $categories);
        $setting = Setting::first();
        view()->share('setting', $setting);
    }
}

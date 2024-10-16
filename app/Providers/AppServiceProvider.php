<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        View::composer(['frontend.index', 'frontend.product_detail'], function ($view) {
            $categories = Category::with('children')->whereNull('parent_id')->get();
            $view->with('categories', $categories);
        });
    }
}

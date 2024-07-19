<?php

namespace App\Providers;

use App\Helpers\CartHelper;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.menu', function ($view) {
            $view->with('cartItemCount', CartHelper::itemCount());
        });
    }
}

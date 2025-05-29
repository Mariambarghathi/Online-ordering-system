<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{

    public function boot()
{
    Paginator::useBootstrap(); // for Bootstrap 4/5 styling
}
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

   
}

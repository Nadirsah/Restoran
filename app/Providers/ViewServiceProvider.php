<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\LangComposer;
use Illuminate\Support\Facades;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.front.lang',LangComposer::class);
    }
}

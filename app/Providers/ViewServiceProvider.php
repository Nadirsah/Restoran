<?php

namespace App\Providers;

use App\View\Composers\AboutComposer;
use App\View\Composers\ChefsComposer;
use App\View\Composers\LangComposer;
use App\View\Composers\MenuComposer;
use App\View\Composers\NavbarComposer;
use App\View\Composers\ServicesComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

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
        Facades\View::composer('layouts.front.lang', LangComposer::class);
        Facades\View::composer('layouts.front.team', ChefsComposer::class);
        Facades\View::composer('layouts.front.service', ServicesComposer::class);
        Facades\View::composer('layouts.front.menu', MenuComposer::class);
        Facades\View::composer(['layouts.front.navbarcontent', 'layouts.front.navbarhomecontent'], NavbarComposer::class);
        Facades\View::composer('layouts.front.about', AboutComposer::class);
    }
}

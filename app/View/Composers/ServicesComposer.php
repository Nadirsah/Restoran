<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Services;
use Illuminate\View\View;

class ServicesComposer
{
    public function compose(View $view): void
    {
        $services = Services::all();
        $view->with('services', $services);

    }
}

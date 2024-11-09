<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Chefs;
use Illuminate\View\View;

class ChefsComposer
{
    public function compose(View $view): void
    {
        $chefs = Chefs::all();
        $view->with('chefs', $chefs);

    }
}

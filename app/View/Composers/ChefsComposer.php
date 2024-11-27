<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Chefs;
use App\Models\Chefs_social;
use Illuminate\View\View;

class ChefsComposer
{
    public function compose(View $view): void
    {
        $chefs = Chefs::take(4)->get();
        $chefs_social = Chefs_social::all();
        $view->with('chefs', $chefs);
        $view->with('chefs_social', $chefs_social);

    }
}

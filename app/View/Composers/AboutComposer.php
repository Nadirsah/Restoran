<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\About;
use App\Models\Chefs;
use Illuminate\View\View;

class AboutComposer
{
    public function compose(View $view): void
    {
        $about = About::with('pictures')->first();
        $view->with('about', $about);

        $chefs_count = Chefs::count();
        $view->with('chefs_count', $chefs_count);

    }
}

<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Navbar;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view): void
    {
        $navbar = Navbar::first();
        $view->with('navbar', $navbar);

    }
}

<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view): void
    {
        $menu = Menu::whereNull('parent_id')->get();
        $data = Menu::whereNotNull('parent_id')->get();
        $view->with('menu', $menu);
        $view->with('data', $data);

    }
}

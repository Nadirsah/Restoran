<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Lang;
use Illuminate\View\View;

class LangComposer
{
    public function compose(View $view): void
    {
        $lang = Lang::get();
        $view->with('lang', $lang);

    }
}

<?php

namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Setting;
use Illuminate\View\View;

class ContactComposer
{
    public function compose(View $view): void
    {
        $setting = Setting::first();
        $view->with('setting', $setting);

    }
}

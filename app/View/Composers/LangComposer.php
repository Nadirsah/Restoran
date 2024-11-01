<?php
namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Lang;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
class LangComposer
{
public function compose(View $view):void
{   
    $lang=Lang::get();
    $view->with('lang', $lang);
  
}
}
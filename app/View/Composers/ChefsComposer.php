<?php
namespace App\View\Composers;

//use App\Repositories\UserRepository;

use App\Models\Chefs;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
class ChefsComposer
{
public function compose(View $view):void
{   
    $chefs=Chefs::all();
    $view->with('chefs', $chefs);
  
}
}
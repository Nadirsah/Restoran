<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('front.menu');
    }
}

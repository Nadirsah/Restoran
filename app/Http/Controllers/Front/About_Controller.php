<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class About_Controller extends Controller
{
    public function index()
    {

        return view('front.about');
    }
}

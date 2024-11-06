<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Chefs;

class AboutController extends Controller
{
    public function index()
    {
        
        return view('front.about');
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('front.service');
    }
}

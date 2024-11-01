<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return view('front.team');
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        return view('front.booking');
    }
}

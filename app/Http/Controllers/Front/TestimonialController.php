<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('front.testimonial');
    }
}

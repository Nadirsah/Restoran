<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // public function redirects(){

    //     $usertype=Auth::user()->user_Type;
    //     if($usertype=='admin')
    //     {
    //         return redirect()->route('admin.dashboard');
    //     }
    //     else{
    //         return redirect('/admin/login');
    //     }
    // }

    public function index()
    {
        return view('index');
    }
}

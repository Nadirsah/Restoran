<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $option=$request->validate([
            'email'=>['required','email'],
            'password'=>"required",
        ]);
        $option['is_active']=1;
        if(Auth::attempt($option)){
            $request->session()->regenerate();
            return redirect('/redirects');

        }
        return redirect()->route('login')->with('type','danger')
            ->with('message','Məlumatlar düzgün doldurulmayıb!');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
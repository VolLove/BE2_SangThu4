<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class   CustomAuthController extends Controller
{

    public function dashboard()
    {
        return view('User.dashboard');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
    public function account()
    {
        return view('User.account', ['user' => Auth::user()]);
    }
}

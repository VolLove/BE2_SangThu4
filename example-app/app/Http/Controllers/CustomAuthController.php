<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class   CustomAuthController extends Controller
{

    public function dashboard()
    {
        return view('FontEnd.dashboard');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}

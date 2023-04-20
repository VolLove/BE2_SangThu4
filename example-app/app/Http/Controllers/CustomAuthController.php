<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CustomAuthController extends Controller
{

    public function dashboard()
    {
        return view('FontEnd.dashboard');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function account()
    {
    }
}
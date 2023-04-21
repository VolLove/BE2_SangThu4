<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class   CustomAuthController extends Controller
{

    public function dashboard()
    {
        return view('BackEnd.userlist');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
    public function account()
    {
        if (Auth::check()) {
            return view('FontEnd.account');
        } else {
            return Redirect('login');
        }
    }
}

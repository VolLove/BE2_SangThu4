<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function dashboard()
    {
        return view('FontEnd.dashboard');
    }


    public function registration()
    {
        return view('FontEnd.registration');
    }
    public function login()
    {
        return view('FontEnd.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function customRegistration(Request $request)
    {
    }
    public function logout(Request $request)
    {
    }
    public function account(Request $request)
    {
    }
}
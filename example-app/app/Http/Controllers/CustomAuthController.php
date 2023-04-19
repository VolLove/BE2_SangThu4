<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'avata' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $avatarName = time() . '.' . $request->avata->extension();
        $request->image->move('uploads/avatars', $avatarName);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'avata' => $data['avata'],
        ]);
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
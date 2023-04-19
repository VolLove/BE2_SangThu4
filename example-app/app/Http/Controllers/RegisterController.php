<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class RegisterController extends Controller
{
    public function registration()
    {
        return view('FontEnd.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required|numeric|between:10,11',
            'avatar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move('uploads/avatars', $avatarName);

        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'avatar' => $avatarName,
        ]);
        $user->save();

        return redirect("registration")->withSuccess('Register success. Please login!');
    }
}
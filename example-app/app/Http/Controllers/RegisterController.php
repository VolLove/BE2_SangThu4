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
        return view('User.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|min:8|',
            'password_confirmation' => 'required|string',
            'phone' => 'nullable|string|size:10',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('avatar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'avatar' => $imageName,
        ]);
        if ($user->save()) {
            $image->move(public_path('avatars'), $imageName);
        }

        return redirect("login")->withSuccess('Register success. Please login!');
    }
}

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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required|between:10,11',
            'avata' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $avatarName = time() . '.' . $request->avata->getClientOriginalExtension();
        $request->avata->move('uploads/avatars', $avatarName);

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'avatar' => $avatarName,
        ]);
        $user->save();

        return redirect("registration")->withSuccess('You have signed up successfully.');
    }
}
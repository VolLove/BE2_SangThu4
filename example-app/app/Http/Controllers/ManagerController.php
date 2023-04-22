<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function userlist()
    {
        $data = User::all();
        return view('BackEnd.userlist', ['users' => $data]);
    }
    public function account()
    {
        if (Auth::check()) {
            return view('FontEnd.account', ['user' => Auth::user()]);
        } else {
            return Redirect('login');
        }
    }
}

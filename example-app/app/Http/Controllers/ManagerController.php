<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    public function userlist()
    {
        $data = User::all();
        return view('BackEnd.userlist', ['users' => $data]);
    }
}
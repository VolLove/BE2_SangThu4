<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function table()
    {
        $data = User::where('is_admin', false)->paginate(10);
        return view('BackEnd.user-table', ['users' => $data]);
    }
    public function search(Request $request)
    {

        $query = $request->get('search');
        $users = User::where('email', 'LIKE', "$query%")->paginate(10);
        return view('BackEnd.user-table', compact('users'));
    }
    public function edit(Request $request)
    {
        return view('BackEnd.project-edit', compact('user'));
    }
}
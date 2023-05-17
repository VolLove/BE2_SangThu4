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
        return view('Admin.table', ['users' => $data], ['page' => "User Table"]);
    }
    public function search(Request $request)
    {

        $query = $request->get('search');
        $users = User::where('email', 'LIKE', "%$query%")->paginate(10);
        return view('Admin.table', compact('users', 'query'));
    }
    public function edit(User $user)
    {
        return view('Admin.edit', compact('user'));
    }
}
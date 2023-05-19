<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function table()
    {
        $page = "User table";
        $users = User::where('is_admin', false)->paginate(10);
        return view('Admin.table', compact('page', 'users'));
    }
    public function search(Request $request)
    {
        $page = "User table";
        $query = $request->get('search');
        $users = User::where('email', 'LIKE', "$query")->paginate(10);
        return view('Admin.table', compact('users', 'query', 'page'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        $page = "User edit";
        return view('Admin.edit', compact('user', 'page'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'name' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $user->avatar = $imageName;
            $image->move(public_path('avatars'), $imageName);
        }
        if ($user->save()) {
            return redirect('admin/user/table')->withSuccess('Thay đổi thành công');
        }
        return back()->withSuccess('Thay đổi thành công');
    }
}

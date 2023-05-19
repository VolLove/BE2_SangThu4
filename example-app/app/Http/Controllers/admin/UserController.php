<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function remove($id)
    {
        $user_destroy = User::find($id);
        $page = "Confirm account deletion.";
        return view('Admin.edit', compact('user_destroy', 'page'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        // Kiểm tra quyền của admin
        if (Auth::user()->is_admin) {
            // Xác nhận mật khẩu của admin
            if (Hash::check(request('password'), Auth::user()->password)) {
                // Xoá user
                $user->delete();
                return redirect()->route('user.table')->with('success', 'User has been deleted successfully!');
            } else {
                // Nếu mật khẩu không trùng khớp, trả về thông báo lỗi
                return back()->withErrors(['password' => 'The password is incorrect!']);
            }
        } else {
            // Nếu không phải admin, trả về thông báo lỗi
            return back()->with(['warning' => 'You do not have permission to delete users!']);
        }
    }
}

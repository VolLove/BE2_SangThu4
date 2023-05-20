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
        //Tên của trang web
        $page = "User table";
        //Lấy những tài khoản không phải addmin và phân trang
        $users = User::where('is_admin', false)->paginate(10);
        return view('Admin.table', compact('page', 'users'));
    }
    public function search(Request $request)
    {

        $page = "User table";
        //tìm kiếm với email chính xác
        $query = $request->get('search');
        $users = User::where('email', 'LIKE', "$query")->paginate(10);
        return view('Admin.table', compact('users', 'query', 'page'));
    }
    public function edit($id)
    {
        //lấy thông tin user và truyền vào trang
        $user = User::find($id);
        $page = "User edit";
        return view('Admin.edit', compact('user', 'page'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
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

            return redirect('admin/user/table')->with('success', 'Cập nhật thành công');
        }
        return back()->withErrors('Thay đổi không công');
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
        // Xác nhận mật khẩu của admin
        if (Hash::check(request('password'), Auth::user()->password)) {
            // Xoá user
            $user->delete();
            return redirect()->route('user.table')->with('success', 'User has been deleted successfully!');
        } else {
            // Nếu mật khẩu không trùng khớp, trả về thông báo lỗi
            return back()->withErrors(['password' => 'The password is incorrect!']);
        }
    }
    public function changepassword($id)
    {
        $user_change_password = User::find($id);
        $page = "Change password.";
        return view('Admin.edit', compact('user_change_password', 'page'));
    }
    public function handlepassword(Request $request, $id)
    {
        if (Hash::check(request('password'), Auth::user()->password)) {
            $user = User::Find($id);
            $request->validate([
                'new_password' => 'required|confirmed|min:8|',
                'new_password_confirmation' => 'required|string',
            ]);
            $user->password = $request->input('password');
            if ($user->save()) {
                return redirect()->route('user.table')->with('success', 'Mật khẩu người dùng đã được đổi đã được thay đổi!');
            }
        } else {
            // Nếu mật khẩu không trùng khớp, trả về thông báo lỗi
            return back()->withErrors(['password' => 'The password admin is incorrect!']);
        }
    }
}

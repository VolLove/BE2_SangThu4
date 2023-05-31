<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\Categories;
use App\Models\Manufacturer;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $manuCount = Manufacturer::all()->count();
        $proCount = Products::all()->count();
        $cateCount = Categories::all()->count();
        $billCount = Bills::all()->count();
        return view('Admin.index', compact('user', 'manuCount', 'proCount', 'cateCount', 'billCount'));
    }
    public function profile()
    {
        $useradmin = Auth::user();
        $user = User::find(Auth::user()->id);
        $bills = DB::table('bills')
            ->where('user_id', Auth::user()->id)
            ->orderByRaw("CASE WHEN status = 'unpaid' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Admin.profile', compact('useradmin', 'bills'));
    }
    public function changepassword()
    {
        $admin = 1;
        $page = "Account change password";
        $user_change_password = Auth::user();
        return view('Admin.edit', compact('user_change_password', 'page', 'admin'));
    }
    public function changepassword_handlers(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed|min:8|max:250',
            'new_password_confirmation' => 'required|string',
        ]);
        if (Hash::check(request('password'), Auth::user()->password)) {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('profile')->with('success', 'Mật khẩu người dùng đã được đổi đã được thay đổi!');
        } else {
            // Nếu mật khẩu không trùng khớp, trả về thông báo lỗi
            return back()->withErrors(['password' => 'The password admin is incorrect!']);
        }
    }
    public function edit()
    {
        $page = 'Profile edit';
        $account = User::find(Auth::user()->id);
        return view('Admin.edit', compact('account', 'page'));
    }
    public function edit_handler(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10|max:255',
            'address' => 'nullable|string|max:255',
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

            return redirect()->route('profile')->with('success', 'Cập nhật thành công');
        }
        return back()->withErrors('Thay đổi không công');
    }
}

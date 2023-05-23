<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BillController extends Controller
{
    public function table()
    {
        $page = "Table bill";
        $bills = Bills::with('user')->orderBy('status', 'ASC')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('page', 'bills'));
    }
    public function view($id)
    {
        $page = "Table view";
        $bill_view = Bills::with('user')->find($id);
        $orders = Orders::with('product')->where('bills_id', $id)->get();
        return view('Admin.table', compact('page', 'bill_view', 'orders'));
    }
    public function remove($id)
    {
        $page = "Table view";
        $bill_remove = Bills::with('user')->find($id);
        $orders = Orders::with('product')->where('bills_id', $id)->get();
        return view('Admin.edit', compact('page', 'bill_remove', 'orders'));
    }
    public function remove_handler($id)
    {
        // Xác nhận mật khẩu của admin
        if (Hash::check(request('password'), Auth::user()->password)) {
            $bill = Bills::find($id);
            $bill->order()->delete();
            $bill->delete();
            return redirect()->route('bills.table')->with('success', 'Order has been deleted!');
        } else {
            // Nếu mật khẩu không trùng khớp, trả về thông báo lỗi
            return back()->withErrors(['password' => 'The password is incorrect!']);
        }
    }
    public function pay($id)
    {
        # code...
    }
}

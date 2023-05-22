<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        # code...
    }
    public function remove_handler($id)
    {
        # code...
    }
    public function pay($id)
    {
        # code...
    }
}

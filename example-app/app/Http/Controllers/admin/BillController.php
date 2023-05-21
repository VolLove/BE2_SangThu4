<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function table()
    {
        $page = "Table bill";
        $bills = Bills::with('category', 'manufacturer')->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('page', 'bills'));
    }
}

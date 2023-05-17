<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function table()
    {
        $products = Products::with('type', 'manufacturer')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('products'), compact('page'));
    }
    public function add()
    {
        $page = "Product Add";
        return view('Admin.add', ['product' => 1], compact('page'));
    }
}
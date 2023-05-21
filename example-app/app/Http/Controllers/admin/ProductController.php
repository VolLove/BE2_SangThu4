<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function table()
    {
        $page = "Product Table";
        $products = Products::with('category', 'manufacturer')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('products', 'page'));
    }
    public function add()
    {
        $page = "Product Add";
        $product = 1;
        return view('Admin.add', compact('page', 'product'));
    }
}

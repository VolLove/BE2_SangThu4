<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function table()
    {
        $data = Products::paginate(10);
        return view('BackEnd.table', ['products' => $data], ['page' => "Products Table"]);
    }
    public function add()
    {
        return view('BackEnd.add', ['product' => 1]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function table()
    {
        $page = "Categories table";
        $categories = Categories::all();
        return view('Admin.table', compact('page', 'categories'));
    }
}

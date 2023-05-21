<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function table()
    {
        $page = "Categories table";
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('page', 'categories'));
    }
}

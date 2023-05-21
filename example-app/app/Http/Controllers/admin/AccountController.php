<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Manufacturer;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $manuCount = Manufacturer::all()->count();
        $proCount = Products::all()->count();
        $cateCount = Categories::all()->count();
        return view('Admin.index', compact('user', 'manuCount', 'proCount', 'cateCount'));
    }
}

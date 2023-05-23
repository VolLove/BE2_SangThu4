<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Categories;
use App\Models\Manufacturer;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DisplayController extends Controller
{
    public function dashboard()
    {
        $products = Products::all();

        return view('User.index');
    }
    public function shopgrid()
    {
        return view('User.shopgrid');
    }
    public function cart()
    {
        return view('User.cart');
    }
    public function checkout()
    {
        return view('User.checkout');
    }
    public function product()
    {
        return view('User.product');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
    public function account()
    {
        return view('User.account', ['user' => Auth::user()]);
    }
}

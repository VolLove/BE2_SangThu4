<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DisplayController extends Controller
{
    public function dashboard()
    {
        $product = Products::take(1)->get();
        $products = Products::with('categories', 'manufacturer')->latest()->take(3)->get();
        return view('User.index', compact('product', 'products'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DisplayController extends Controller
{
    public function dashboard()
    {
        $product = Products::first();
        $products = Products::with('categories')->latest()->take(3)->get();
        return view('User.index', compact('product', 'products'));
    }
    public function shopgrid()
    {
        $products = DB::table('products')->orderBy('created_at', 'desc')->paginate(9);
        return view('User.shopgrid', compact('products'));
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

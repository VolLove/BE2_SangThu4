<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('FontEnd/index');
    });
    Route::get('/login', function () {
        return view('FontEnd/login');
    });
    Route::get('/register', function () {
        return view('FontEnd/register');
    });

    Route::get('/product', function () {
        return view('FontEnd/product');
    });

    Route::get('/shopgrid', function () {
        return view('FontEnd/shopgrid');
    });

    Route::get('/checkout', function () {
        return view('FontEnd/checkout');
    });

    Route::get('/cart', function () {
        return view('FontEnd/cart');
    });
});

Route::prefix('Admind', function () {
    return view('BackEnd/index');
});

<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\ManufacterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login_custom', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [RegisterController::class, 'registration'])->name('registration');
Route::post('registration_custom', [RegisterController::class, 'customRegistration'])->name('register.custom');


Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/', [CustomAuthController::class, 'account']);
});



Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', [AccountController::class, 'index']);
    Route::get('/index', [AccountController::class, 'index']);
    Route::get('login', [AccountController::class, 'login']);
    Route::get('register', [AccountController::class, 'register']);
    Route::prefix('user')->group(function () {
        Route::get('table', [UserController::class, 'table']);
        Route::get('search', [UserController::class, 'search'])->name('table.search');
        Route::get('{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('{user}/detail', [UserController::class, 'detail'])->name('user.detail');
        Route::get('{user}/add', [UserController::class, 'add'])->name('user.add');
        Route::get('{user}/remove', [UserController::class, 'edit'])->name('user.remove');
    });
    Route::prefix('product')->group(function () {
        Route::get('table', [ProductController::class, 'table']);
        Route::get('edit', [ProductController::class, 'edit']);
    });
    Route::prefix('type')->group(function () {
        Route::get('table', [TypeController::class, 'table']);
        Route::get('edit', [TypeController::class, 'edit']);
    });
    Route::prefix('manufacter')->group(function () {
        Route::get('table', [ManufacterController::class, 'table']);
        Route::get('edit', [ManufacterController::class, 'edit']);
    });
    Route::prefix('bill')->group(function () {
        Route::get('table', [BillController::class, 'table']);
        Route::get('edit', [BillController::class, 'edit']);
    });
});

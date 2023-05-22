<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ManufacterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Bills;
use App\Models\Categories;

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
Route::get('registration', [RegisterController::class, 'page'])->name('registration');
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
        Route::prefix('table')->group(function () {
            Route::get('/', [UserController::class, 'table'])->name('user.table');
            Route::get('search', [UserController::class, 'search'])->name('user.search');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('remove/{id}', [UserController::class, 'remove'])->name('user.remove');
            Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
            Route::get('changepassword/{user}', [UserController::class, 'changepassword'])->name('user.changepassword');
            Route::post('handlepassword/{user}', [UserController::class, 'handlepassword'])->name('user.handlepassword');
        });
    });
    Route::prefix('product')->group(function () {
        Route::get('table', [ProductController::class, 'table'])->name('product.table');
        Route::get('add', [ProductController::class, 'add'])->name('product.add');
        Route::post('add', [ProductController::class, 'add_handler'])->name('product.addhandler');
        Route::get('destroy/{id}', [ProductController::class, 'deleteproduct'])->name('product.destroy');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('edithandler/{id}', [ProductController::class, 'edit_handler'])->name('product.edithandle');
    });
    Route::prefix('categories')->group(function () {
        Route::get('table', [CategoriesController::class, 'table'])->name('categories.table');
        Route::get('add', [CategoriesController::class, 'add'])->name('categories.add');
        Route::post('add', [CategoriesController::class, 'add_handler'])->name('categories.addhandler');
        Route::get('remove/{id}', [CategoriesController::class, 'remove'])->name('categories.remove');
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::post('edit/{id}', [CategoriesController::class, 'edit_handler'])->name('categories.edithandler');
    });
    Route::prefix('manufacter')->group(function () {
        Route::get('table', [ManufacterController::class, 'table'])->name('manufacter.table');
        Route::get('add', [ManufacterController::class, 'add'])->name('manufacter.add');
        Route::post('add', [ManufacterController::class, 'add_handler'])->name('manufacter.addhandler');
        Route::get('destroy/{id}', [ManufacterController::class, 'deletemanu'])->name('manufacter.destroy');
        Route::get('edit/{id}', [ManufacterController::class, 'edit'])->name('manufacter.edit');
        Route::post('edit/{id}', [ManufacterController::class, 'edit_handler'])->name('manufacter.edithandler');
    });
    Route::prefix('bill')->group(function () {
        Route::get('table', [BillController::class, 'table'])->name('bills.table');
        Route::get('view/{id}', [BillController::class, 'view'])->name('bills.view');
        Route::get('pay/{id}', [BillController::class, 'pay'])->name('bills.pay');
        Route::get('remove/{id}', [BillController::class, 'remove'])->name('bills.remove');
        Route::post('remove/{id}', [BillController::class, 'remove_handler'])->name('bills.removehandler');
    });
});

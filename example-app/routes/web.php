<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
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
Route::post('login', [LoginController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [RegisterController::class, 'registration'])->name('registration');
Route::post('registration', [RegisterController::class, 'customRegistration'])->name('register.custom');

Route::get('userlist', [ManagerController::class, 'userlist']);
Route::get('account', [ManagerController::class, 'account'])->middleware('auth');

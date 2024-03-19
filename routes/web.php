<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\checkAdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('auth/login');
// });
Auth::routes();
Route::get('/', [App\Http\Controllers\UserController::class, 'getLogin'])->name('/');
// Route::post('/', [App\Http\Controllers\UserController::class, 'postLogin'])->name('login');
// Route::post('/', [App\Http\Controllers\UserController::class, 'demo'])->name('check');
Route::get('/homeadmin', [App\Http\Controllers\UserController::class, 'adminlogin'])->name('adminlogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('checkAdminLogin')->name('home');

Route::get('/home', [App\Http\Controllers\ProductController::class, 'export'])->name('product');

Route::post('/order/add', [App\Http\Controllers\OrderController::class, 'add'])->name('addOrder');
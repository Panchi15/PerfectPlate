<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::post('/customer/signup', [\App\Http\Controllers\Auth\LoginController::class, 'signup'])->name('customer.signup');
Route::post('/customer/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('customer.login');
Route::get('/login', function () {
    return view('welcome');
});
Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/forgotpassword', [\App\Http\Controllers\Auth\LoginController::class, 'forgotpassword'])->name('forgotpassword');
Route::put('/newpassword', [\App\Http\Controllers\Auth\LoginController::class, 'newpassword'])->name('newpassword');

Auth::routes();

Route::middleware('auth:web')->group(function (){
    Route::get('/customer/menu', [\App\Http\Controllers\CustomerController::class, 'menu'])->name('customer.menu');
    Route::get('/customer/menu/search', [\App\Http\Controllers\CustomerController::class, 'search'])->name('customer.menu.search');
    Route::post('/customer/cart/add', [\App\Http\Controllers\CartController::class, 'store'])->name('customer.cart.add');
    Route::get('/customer/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('customer.cart');
    Route::delete('/customer/cart/{cart}/delete', [\App\Http\Controllers\CartController::class, 'destroy'])->name('customer.cart.delete');
    Route::get('/customer/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('customer.cart.checkout');
});

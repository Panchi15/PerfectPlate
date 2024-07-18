<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::post('/customer/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('customer.signup');
Route::post('/customer/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('customer.login');
Route::get('/login', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware('auth:web')->group(function (){
    Route::get('/customer/menu', [\App\Http\Controllers\CustomerController::class, 'menu'])->name('customer.menu');
    Route::get('/customer/menu/search', [\App\Http\Controllers\CustomerController::class, 'search'])->name('customer.menu.search');
    Route::get('/customer/menu/filter', [\App\Http\Controllers\CustomerController::class, 'filter'])->name('customer.menu.filter');
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::post('/customer/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('customer.signup');
Route::post('/customer/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('customer.login');

Auth::routes();

Route::middleware('auth:web')->group(function (){
    Route::get('/customer/menu', [\App\Http\Controllers\CustomerController::class, 'menu'])->name('customer.menu');
});

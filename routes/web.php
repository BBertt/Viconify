<?php

use App\Http\Controllers\MsProductController;
use App\Http\Controllers\MsUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/', [RouteController::class, 'HomePage'])->name('HomePage');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RouteController::class, 'Register'])->name('Register');
    Route::post('/register', [MsUserController::class, 'register'])->name('registerform');

    Route::get('/login', [RouteController::class, 'Login'])->name('Login');
    Route::post('/login', [MsUserController::class, 'login'])->name('loginform');
});

Route::middleware('auth')->group(function () {
    Route::post('/', [MsUserController::class, 'logout'])->name('logout');
});

// Routing to Shop Pages
// Route::get('/shop', [MsProductController::class, 'index'])->name('shop');
Route::resource('shop', MsProductController::class);

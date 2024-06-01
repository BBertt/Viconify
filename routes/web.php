<?php

use App\Http\Controllers\MsUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\MsVideoController;

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

Route::get('/shorts', [RouteController::class, 'Shorts'])->name('Shorts');
Route::post('/shorts/{id}/like', [MsVideoController::class, 'like'])->name('shorts.like');
Route::post('/shorts/{id}/dislike', [MsVideoController::class, 'dislike'])->name('shorts.dislike');
Route::get('/shorts-first', [MsVideoController::class, 'firstShort'])->name('shorts.first');
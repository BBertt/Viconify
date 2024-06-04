<?php

use App\Http\Controllers\MsCartController;
use App\Http\Controllers\MsMessageController;
use App\Http\Controllers\MsProductController;
use App\Http\Controllers\MsUserController;
use App\Http\Controllers\MsVideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/', [RouteController::class, 'HomePage'])->name('HomePage');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RouteController::class, 'Register'])->name('Register');
    Route::post('/register', [MsUserController::class, 'register'])->name('registerform');

    Route::get('/login', [RouteController::class, 'Login'])->name('login');
    Route::post('/login', [MsUserController::class, 'login'])->name('loginform');
});

Route::middleware('auth')->group(function () {
    Route::post('/', [MsUserController::class, 'logout'])->name('logout');
    Route::get('/topup', [RouteController::class, 'showForm'])->name('topup.form');
    Route::post('/topup', [MsUserController::class, 'processTopUp'])->name('topup.process');
    Route::get('/chat', [MsMessageController::class, 'index'])->name('chat.index');
    Route::get('/chat/messages/{friendId}', [MsMessageController::class, 'fetchMessages'])->name('chat.fetchMessages');
    Route::post('/chat/messages', [MsMessageController::class, 'sendMessage'])->name('chat.sendMessage');
    Route::post('/chat/add-friend', [MsMessageController::class, 'addFriend'])->name('chat.addFriend');
    Route::post('/chat/accept-friend/{friendListId}', [MsMessageController::class, 'acceptFriend'])->name('chat.acceptFriend');
    Route::get('/profile', [MsUserController::class, 'show'])->name('profile.show');
    Route::post('/profile', [MsUserController::class, 'update'])->name('profile.update');
});

Route::resource('/videos', MsVideoController::class);

// Routing to Shop Pages
Route::get('/shop', [MsProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{msProduct}', [MsProductController::class, 'show'])->name('shop.show');

// Routingto Cart Pages
Route::post('/cart', [MsCartController::class, 'store'])->name('cart.store');

<?php

use App\Http\Controllers\MsCartController;
use App\Http\Controllers\MsCommentController;
use App\Http\Controllers\MsMessageController;
use App\Http\Controllers\MsPostController;
use App\Http\Controllers\MsProductController;
use App\Http\Controllers\MsUserController;
use App\Http\Controllers\MsVideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionHeaderController;
use App\Models\TransactionDetail;

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

    Route::get('/cart', [MsCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{ProductID}', [MsCartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [MsCartController::class, 'destroy'])->name('cart.destroy');

    Route::post('/purchase', [TransactionHeaderController::class, 'store'])->name('purchase');
    Route::get('/transaction', [TransactionHeaderController::class, 'index'])->name('transaction');
    Route::put('/transaction/updateStatus/{transactionID}/{productID}', [TransactionDetailController::class, 'updateStatus'])->name('transaction.updateStatus');

    Route::get('/shop/register', function() {
        return view('shop.register');
    })->name('shop.register.index');
    Route::post('/shop/register', [MsUserController::class, 'registerShop'])->name('shop.register.store');
    Route::post('/product/store', [MsProductController::class, 'store'])->name('product.store');
    Route::delete('/product/{msProduct}', [MsProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/edit/{id}', [MsProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [MsProductController::class, 'update'])->name('product.update');

    Route::delete('/video/delete/{id}', [MsVideoController::class, 'destroy'])->name('video.delete');
    Route::get('/video/edit/{id}', [MsVideoController::class, 'edit'])->name('video.edit');
    Route::post('/video/update/{id}', [MsVideoController::class, 'update'])->name('video.update');

    Route::post('/video/store', [MsVideoController::class, 'store'])->name('video.store');
    Route::post('/video/storeshort', [MsVideoController::class, 'storeshort'])->name('video.storeshort');
    Route::post('/post/store', [MsPostController::class, 'store'])->name('post.store');

    Route::post('/post/store', [MsPostController::class, 'store'])->name('post.store');

    Route::post('/posts/{id}/comments', [MsCommentController::class, 'store'])->name('posts.storeComment');
    Route::delete('/posts/{id}', [MsPostController::class, 'destroy'])->name('post.delete');
    Route::put('/posts/{id}', [MsPostController::class, 'update'])->name('post.update');
});
Route::get('/posts', [MsPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [MsPostController::class, 'show'])->name('posts.show');

Route::resource('/videos', MsVideoController::class);

// Routing to Shop Pages
Route::get('/shop', [MsProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{msProduct}', [MsProductController::class, 'show'])->name('shop.show');

// Shorts
Route::get('/shorts', [MsVideoController::class, 'showShorts'])->name('shorts');
Route::get('/shorts/{id}', [MsVideoController::class, 'showShortsById'])->name('shorts.showShortsById');
Route::post('/short/{video}/like', [MsVideoController::class, 'like'])->name('short.like');
Route::post('/short/{video}/dislike', [MsVideoController::class, 'dislike'])->name('short.dislike');
Route::post('/short/{video}/share', [MsVideoController::class, 'share'])->name('short.share');

// User Page
Route::get('/UserPage/{user}', [MsUserController::class, 'showUser'])->name('userPage');

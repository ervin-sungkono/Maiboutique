<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\TransactionController;

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    // all admin related function goes here
    //GET
    Route::get('/product', [ProductController::class, 'showForm'])->name('product.form');
    //POST
    Route::post('/product', [ProductController::class, 'store'])->name('product.create');
    //DELETE
    Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
});

Route::middleware('isUser')->group(function () {
    // all member related function goes here
    // GET
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.detail');
    Route::get('/cart/{id}', [CartController::class, 'showForm'])->name('cart.form');
    Route::get('/history', [TransactionController::class, 'getTransaction'])->name('transaction.history');
    // POST
    Route::post('/cart', [CartController::class, 'store'])->name('cart.create');
    // PATCH
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    // DELETE
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
});

Route::middleware('auth')->group(function () {
    // all authenticated user related function goes here
    //GET
    Route::get('/home', [ProductController::class, 'index'])->name('home');
    Route::get('/product/{id}', [ProductController::class, 'viewDetail'])->name('product.detail');
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/profile', [ProfileController::class, 'checkProfile'])->name('profile');
    Route::get('/profile/update', [ProfileController::class, 'update'])->name('profile.form');
    Route::get('/password/update', [ProfileController::class, 'updatePass'])->name('password.form');
    //POST
    Route::post('/checkout',[TransactionController::class, 'store'])->name('transaction.create');
    //PATCH
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
});

Route::middleware('guest')->group(function () {
    // GET
    Route::get('/', function () { return view('welcome'); })->name('welcome');
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);

    // POST
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware('guest');
});

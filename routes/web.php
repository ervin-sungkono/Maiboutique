<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::prefix('admin')->namespace('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // all admin related function goes here
    //GET

    //POST

    //PATCH

    //DELETE

});

Route::middleware('auth')->group(function () {
    // all member related function goes here
    //GET
    Route::get('/home', [ProductController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [ProductController::class, 'viewDetail'])->name('product.detail');
    //POST

    //PATCH

    //DELETE

});

Route::middleware('guest')->group(function () {
    // GET
    Route::get('/', function () { return view('welcome'); });
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    // POST
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware('guest');
});

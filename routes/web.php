<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;

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
    //POST

    //PATCH

    //DELETE

});

Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('welcome'); });
});

Auth::routes();

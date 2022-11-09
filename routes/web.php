<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->namespace('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // all admin related function goes here
    //GET

    //POST

    //PATCH

    //DELETE

});

Route::namespace('member')->middleware('auth')->group(function () {
    // all member related function goes here
    //GET
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //POST

    //PATCH

    //DELETE
    
});

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

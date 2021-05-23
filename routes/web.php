<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\loginController;
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

Route::get('/', function () {
    return view('trangchu');    
})->name('home');
Route::get('/signup', [SignupController::class,'index'])->name('auth.show');
Route::post('/signup', [SignupController::class,'store'])->name('auth.post');
Route::get('/login', [loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class,'login'])->name('auth.login');
Route::get('/logout', [loginController::class,'logout'])->name('auth.logout');




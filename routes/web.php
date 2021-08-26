<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\HosoController;
use App\Http\Controllers\DangkithiController;
use App\Http\Controllers\TracuuController;

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

// home
Route::get('/', function () {
    return view('trangchu');
})->name('home');

// sign up and login
Route::get('/signup', [SignupController::class, 'index'])->name('auth.show');
Route::post('/signup', [SignupController::class, 'store'])->name('auth.post');
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('auth.login');
Route::get('/logout', [loginController::class, 'logout'])->name('auth.logout');


//Middleware
Route::group(['middleware' => 'verfiy-account'], function () {
    // profile of student
    Route::get('/Khaothi/Hoso', [HosoController::class, 'show'])->name('hoso.show');
    Route::post('/Khaothi/Hoso', [HosoController::class, 'store'])->name('hoso.store');
    Route::get('/Khaothi/capNhatHS', [HosoController::class, 'updateshow'])->name('hoso.updateshow');
    Route::post('/Khaothi/capNhatHS', [HosoController::class, 'updatestore'])->name('hoso.updatestore');

    // exam registration
    Route::get('/Khaothi/dangkithi', [DangkithiController::class, 'show'])->name('dangkithi.show');
    Route::get('/Khaothi/dangkithi/{id}', [DangkithiController::class, 'detail'])->name('detail');
    Route::post('/Khaothi/dangkithi/{id}', [DangkithiController::class, 'store'])->name('dangkithi.store');

    // update exam registration
    Route::get('/Khaothi/CNdangkithi', [DangkithiController::class, 'updateshow'])->name('dangkithi.updateshow');
    Route::get('/Khaothi/CNdangkithi/{id}', [DangkithiController::class, 'detail2'])->name('detail2');
    Route::post('/Khaothi/CNdangkithi/{id}', [DangkithiController::class, 'updatestore'])->name('dangkithi.updatestore');

    // show information of exam registration 
    Route::get('/tracuu1', [TracuuController::class, 'showlist'])->name('Tracuu.showlist');
    Route::get('/tracuu1/{id}', [TracuuController::class, 'show'])->name('Tracuu.show');
});

// load ajax districts
Route::get('/districts/{id}', [HosoController::class, 'getDistricts']);

<?php

use App\Frontend\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/warna', function () {
    return view('warna.index');
});

Route::get('/user', function () {
    return view('user.index');
});

Route::get('/employee', function () {
    return view('employee.index');
});

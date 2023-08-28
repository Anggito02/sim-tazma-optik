<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::get('/token-test', function() {
    try {
        return response()->json([
            'status' => 'success',
            'message' => 'Token is valid'
        ]);
    } catch (Exception $error) {
        return response()->json([
            'status' => 'error',
            'message' => $error->getMessage()
        ]);
    }
})->middleware('auth:sanctum');

Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Method Not Allowed'
    ])->setStatusCode(405);
})->where('any', '.*');

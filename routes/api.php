<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmployeeController;

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

Route::controller(EmployeeController::class)->group(function() {
    Route::get('/employee/one', 'getEmployee')->name('getEmployee');
    Route::get('/employee/all', 'getAllEmployees')->name('getAllEmployee');
    Route::post('/employee/add', 'addEmployee')->name('addEmployee');
    Route::delete('/employee/delete', 'deleteEmployee')->name('deleteEmployee');
    Route::put('/employee/edit', 'editEmployee')->name('editEmployee');
});

Route::controller(ColorController::class)->group(function() {
    Route::get('/color/one', 'getColor')->name('getColor');
    Route::get('/color/all', 'getAllColor')->name('getAllColors');
    Route::post('/color/add', 'addColor')->name('addColor');
    Route::delete('/color/delete', 'deleteColor')->name('deleteColor');
    Route::put('/color/edit', 'editColor')->name('editColor');
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

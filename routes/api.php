<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmployeeController;
use App\Models\Color;

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

Route::middleware(['auth:sanctum', 'isAdministrator'])->group(function() {
    /* Employee Routes */
    Route::get('/employee/one', [EmployeeController::class, 'getEmployee'])->name('getEmployee');
    Route::get('/employee/all', [EmployeeController::class, 'getAllEmployees'])->name('getAllEmployee');
    Route::post('/employee/add', [EmployeeController::class, 'addEmployee'])->name('addEmployee');
    Route::delete('/employee/delete', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');
    Route::put('/employee/edit', [EmployeeController::class, 'editEmployee'])->name('editEmployee');

    /* Color Routes */
    Route::get('/color/one', [ColorController::class, 'getColor'])->name('getColor');
    Route::get('/color/all', [ColorController::class, 'getAllColor'])->name('getAllColors');
    Route::post('/color/add', [ColorController::class, 'addColor'])->name('addColor');
    Route::delete('/color/delete', [ColorController::class, 'deleteColor'])->name('deleteColor');
    Route::put('/color/edit', [ColorController::class, 'editColor'])->name('editColor');
});

Route::middleware('guest')->group(function() {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
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

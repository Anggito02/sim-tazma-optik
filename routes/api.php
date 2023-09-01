<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\IndexController;

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

/* User Info Routes */
Route::post('/user/info', [AuthController::class, 'getUserInfo'])->middleware('auth:sanctum')->name('getUserInfo');

/* Administrator Routes */
// Route::middleware(['auth:sanctum', 'isAdministrator'])->group(function() {
    /* Employee Routes */
    Route::get('/employee/one', [EmployeeController::class, 'getEmployee'])->name('getEmployee');
    Route::get('/employee/all', [EmployeeController::class, 'getAllEmployees'])->name('getAllEmployee');
    Route::post('/employee/add', [EmployeeController::class, 'addEmployee'])->name('addEmployee');
    Route::delete('/employee/delete', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');
    Route::put('/employee/edit', [EmployeeController::class, 'editEmployee'])->name('editEmployee');
    // === //
    Route::get('/employee/branch/all', [EmployeeController::class, 'getAllBranchById'])->name('getAllBranchById');


    /* Color Routes */
    Route::get('/color/one', [ColorController::class, 'getColor'])->name('getColor');
    Route::get('/color/all', [ColorController::class, 'getAllColor'])->name('getAllColors');
    Route::post('/color/add', [ColorController::class, 'addColor'])->name('addColor');
    Route::delete('/color/delete', [ColorController::class, 'deleteColor'])->name('deleteColor');
    Route::put('/color/edit', [ColorController::class, 'editColor'])->name('editColor');


    /* Vendor Routes */
    Route::get('/vendor/one', [VendorController::class, 'getVendor'])->name('getVendor');
    Route::get('/vendor/all', [VendorController::class, 'getAllVendor'])->name('getAllVendor');
    Route::post('/vendor/add', [VendorController::class, 'addVendor'])->name('addVendor');
    Route::delete('/vendor/delete', [VendorController::class, 'deleteVendor'])->name('deleteVendor');
    Route::put('/vendor/edit', [VendorController::class, 'editVendor'])->name('editVendor');


    /* Brand Routes */
    Route::get('/brand/one', [BrandController::class, 'getBrand'])->name('getBrand');
    Route::get('/brand/all', [BrandController::class, 'getAllBrand'])->name('getAllBrand');
    Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('addBrand');
    Route::delete('/brand/delete', [BrandController::class, 'deleteBrand'])->name('deleteBrand');
    Route::put('/brand/edit', [BrandController::class, 'editBrand'])->name('editBrand');


    /* Branch Routes */
    Route::get('/branch/one', [BranchController::class, 'getBranch'])->name('getBranch');
    Route::get('/branch/all', [BranchController::class, 'getAllBranch'])->name('getAllBranch');
    Route::post('/branch/add', [BranchController::class, 'addBranch'])->name('addBranch');
    Route::delete('/branch/delete', [BranchController::class, 'deleteBranch'])->name('deleteBranch');
    Route::put('/branch/edit', [BranchController::class, 'editBranch'])->name('editBranch');

    /* Index Routes */
    Route::get('/index/one', [IndexController::class, 'getIndex'])->name('getIndex');
    Route::get('/index/all', [IndexController::class, 'getAllIndex'])->name('getAllIndex');
    Route::post('/index/add', [IndexController::class, 'addIndex'])->name('addIndex');
    Route::delete('/index/delete', [IndexController::class, 'deleteIndex'])->name('deleteIndex');
    Route::put('/index/edit', [IndexController::class, 'editIndex'])->name('editIndex');


// });

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
        'message' => 'Not found'
    ])->setStatusCode(404);
})->where('any', '.*');

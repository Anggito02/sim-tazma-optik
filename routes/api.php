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
use App\Http\Controllers\LensCategoryController;
use App\Http\Controllers\FrameCategoryController;
use App\Http\Controllers\CoaController;

use App\Http\Controllers\Modules\ItemController;
use App\Http\Controllers\Modules\PurchaseOrderController;
use App\Http\Controllers\Modules\ReceiveOrderController;
use App\Http\Controllers\Modules\PurchaseOrderDetailController;
use App\Http\Controllers\Modules\VendorInvoiceController;

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

Route::middleware(['auth:sanctum'])->group(function() {
    /* User Info Routes */
    Route::post('/user/info', [AuthController::class, 'getUserInfo'])->middleware('auth:sanctum')->name('getUserInfo');

    /* Auth Routes */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/* Administrator Routes */
Route::middleware(['auth:sanctum', 'isAdministrator'])->group(function() {

    /* Employee Routes */
    Route::get('/employee/one', [EmployeeController::class, 'getEmployee'])->name('getEmployee');
    Route::get('/employee/all', [EmployeeController::class, 'getAllEmployees'])->name('getAllEmployee');
    Route::delete('/employee/delete', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');
    Route::put('/employee/edit', [EmployeeController::class, 'editEmployee'])->name('editEmployee');
    // === //
    Route::get('/employee/branch/all', [EmployeeController::class, 'getAllBranchByEmployeeId'])->name('getAllBranchByEmployeeId');


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

    // === //
    Route::get('/branchWith/employee/all', [BranchController::class, 'getAllBranchWithEmployee'])->name('getAllBranchWithEmployee');

    /* Index Routes */
    Route::get('/index/one', [IndexController::class, 'getIndex'])->name('getIndex');
    Route::get('/index/all', [IndexController::class, 'getAllIndex'])->name('getAllIndex');
    Route::post('/index/add', [IndexController::class, 'addIndex'])->name('addIndex');
    Route::delete('/index/delete', [IndexController::class, 'deleteIndex'])->name('deleteIndex');
    Route::put('/index/edit', [IndexController::class, 'editIndex'])->name('editIndex');

    /* Lens Category Controllers */
    Route::get('/lens-category/one', [LensCategoryController::class, 'getLensCategory'])->name('getLensCategory');
    Route::get('/lens-category/all', [LensCategoryController::class, 'getAllLensCategory'])->name('getAllLensCategory');
    Route::post('/lens-category/add', [LensCategoryController::class, 'addLensCategory'])->name('addLensCategory');
    Route::delete('/lens-category/delete', [LensCategoryController::class, 'deleteLensCategory'])->name('deleteLensCategory');
    Route::put('/lens-category/edit', [LensCategoryController::class, 'editLensCategory'])->name('editLensCategory');

    /* Frame Category Controllers */
    Route::get('/frame-category/one', [FrameCategoryController::class, 'getFrameCategory'])->name('getFrameCategory');
    Route::get('/frame-category/all', [FrameCategoryController::class, 'getAllFrameCategory'])->name('getAllFrameCategory');
    Route::post('/frame-category/add', [FrameCategoryController::class, 'addFrameCategory'])->name('addFrameCategory');
    Route::delete('/frame-category/delete', [FrameCategoryController::class, 'deleteFrameCategory'])->name('deleteFrameCategory');
    Route::put('/frame-category/edit', [FrameCategoryController::class, 'editFrameCategory'])->name('editFrameCategory');

    /* Coa Controllers */
    Route::get('/coa/one', [CoaController::class, 'getCoa'])->name('getCoa');
    Route::get('/coa/all', [CoaController::class, 'getAllCoa'])->name('getAllCoa');
    Route::post('/coa/add', [CoaController::class, 'addCoa'])->name('addCoa');
    Route::delete('/coa/delete', [CoaController::class, 'deleteCoa'])->name('deleteCoa');
    Route::put('/coa/edit', [CoaController::class, 'editCoa'])->name('editCoa');

    /* Item Controllers */
    Route::get('/item/one', [ItemController::class, 'getItem'])->name('getItem');
    Route::get('/item/all', [ItemController::class, 'getAllItem'])->name('getAllItem');
    Route::get('/item/allWithJenis', [ItemController::class, 'getAllItemWithJenis'])->name('getAllItemWithJenis');
    Route::post('/item/add', [ItemController::class, 'addItem'])->name('addItem');
    Route::delete('/item/delete', [ItemController::class, 'deleteItem'])->name('deleteItem');
    Route::put('/item/edit', [ItemController::class, 'editItem'])->name('editItem');

    /* Purchase Order Controllers */
    Route::get('/purchase-order/one', [PurchaseOrderController::class, 'getPO'])->name('getPO');
    Route::get('/purchase-order/all', [PurchaseOrderController::class, 'getAllPO'])->name('getAllPO');
    Route::post('/purchase-order/add', [PurchaseOrderController::class, 'addPO'])->name('addPO');
    Route::delete('/purchase-order/delete', [PurchaseOrderController::class, 'deletePO'])->name('deletePO');
    Route::put('/purchase-order/edit', [PurchaseOrderController::class, 'editPO'])->name('editPO');

    /* === */
    Route::get('/purchase-orderWith/info/all', [PurchaseOrderController::class, 'getAllPOWithInfo'])->name('getAllPOWithInfo');
    Route::get('/purchase-orderWith/info/one', [PurchaseOrderController::class, 'getPOWithInfo'])->name('getPOWithInfo');

    /* Receive Order Controllers */
    Route::get('/receive-order/one', [ReceiveOrderController::class, 'getReceiveOrder'])->name('getReceiveOrder');
    Route::get('/receive-order/all', [ReceiveOrderController::class, 'getAllReceiveOrder'])->name('getAllReceiveOrder');
    Route::post('/receive-order/add', [ReceiveOrderController::class, 'addReceiveOrder'])->name('addReceiveOrder');
    Route::delete('/receive-order/delete', [ReceiveOrderController::class, 'deleteReceiveOrder'])->name('deleteReceiveOrder');
    Route::put('/receive-order/edit', [ReceiveOrderController::class, 'editReceiveOrder'])->name('editReceiveOrder');

    /* Purchase Order Detail Controllers */
    Route::get('/purchase-order-detail/one', [PurchaseOrderDetailController::class, 'getPODetail'])->name('getPODetail');
    Route::get('/purchase-order-detail/all', [PurchaseOrderDetailController::class, 'getAllPODetail'])->name('getAllPODetail');
    Route::post('/purchase-order-detail/add', [PurchaseOrderDetailController::class, 'addPODetail'])->name('addPODetail');
    Route::delete('/purchase-order-detail/delete', [PurchaseOrderDetailController::class, 'deletePODetail'])->name('deletePODetail');
    Route::put('/purchase-order-detail/edit', [PurchaseOrderDetailController::class, 'editPODetail'])->name('editPODetail');

    /* Vendor Invoice Controllers */
    Route::get('/vendor-invoice/one', [VendorInvoiceController::class, 'getVendorInvoice'])->name('getVendorInvoice');
    Route::get('/vendor-invoice/all', [VendorInvoiceController::class, 'getAllVendorInvoice'])->name('getAllVendorInvoice');
    Route::post('/vendor-invoice/add', [VendorInvoiceController::class, 'addVendorInvoice'])->name('addVendorInvoice');
    Route::delete('/vendor-invoice/delete', [VendorInvoiceController::class, 'deleteVendorInvoice'])->name('deleteVendorInvoice');
    Route::put('/vendor-invoice/edit', [VendorInvoiceController::class, 'editVendorInvoice'])->name('editVendorInvoice');

});

Route::middleware('guest')->group(function() {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/token-test', function() {
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
        'message' => 'Endpoint not found'
    ])->setStatusCode(404);
})->where('any', '.*');

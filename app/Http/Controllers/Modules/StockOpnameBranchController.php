<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\StockOpnameBranch\GetAllStockOpnameBranchService;
use App\Services\Modules\StockOpnameBranch\AddStockOpnameBranchService;

class StockOpnameBranchController extends Controller
{
    public function __construct(
        private GetAllStockOpnameBranchService $getAllStockOpnameBranchService,
        private AddStockOpnameBranchService $addStockOpnameBranchService,
    )
    {}

    /**
     * Get all Stock Opname Branch
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllStockOpnameBranch(Request $request) {
        try {
            $stockOpnameBranchInfoDTO = $this->getAllStockOpnameBranchService->getAllStockOpnameBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all Stock Opname Branch success',
                'data' => $stockOpnameBranchInfoDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all Stock Opname Branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add Stock Opname Branch
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStockOpnameBranch(Request $request) {
        try {
            $newStockOpnameBranchDTO = $this->addStockOpnameBranchService->addStockOpnameBranch($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add Stock Opname Branch success',
                'data' => $newStockOpnameBranchDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add Stock Opname Branch failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\StockOpnameBranchDetail\GetStockOpnameBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\GetAllStockOpnameBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\AddStockOpnameBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\EditStockOpnameBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\AdjustStockOpnameBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\MakeAdjustmentSOBranchDetailService;

class StockOpnameBranchDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetStockOpnameBranchDetailService $getStockOpnameBranchDetailService,
        private GetAllStockOpnameBranchDetailService $getAllStockOpnameBranchDetailService,
        private AddStockOpnameBranchDetailService $addStockOpnameBranchDetailService,
        private EditStockOpnameBranchDetailService $editStockOpnameBranchDetailService,
        private AdjustStockOpnameBranchDetailService $adjustStockOpnameBranchDetailService,
        private MakeAdjustmentSOBranchDetailService $makeAdjustmentSOBranchDetailService,
    )
    {}

    /**
     * Get Stock Opname Branch Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStockOpnameBranchDetail(Request $request) {
        try {
            $stockOpnameBranchDetailInfoDTO = $this->getStockOpnameBranchDetailService->getStockOpnameBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $stockOpnameBranchDetailInfoDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Get All Stock Opname Branch Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllStockOpnameBranchDetail(Request $request)
    {
        try {
            $stockOpnameBranchDetailDTO = $this->getAllStockOpnameBranchDetailService->getAllStockOpnameBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $stockOpnameBranchDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Add Stock Opname Branch Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStockOpnameBranchDetail(Request $request) {
        try {
            $newStockOpnameBranchDetailDTO = $this->addStockOpnameBranchDetailService->addStockOpnameBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $newStockOpnameBranchDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Edit Stock Opname Branch Detail
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editStockOpnameBranchDetail(Request $request) {
        try {
            $editStockOpnameBranchDetailDTO = $this->editStockOpnameBranchDetailService->editStockOpnameBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $editStockOpnameBranchDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Update Stock Opname Branch Detail Adjustment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adjustStockOpnameBranchDetail(Request $request) {
        try {
            $adjustStockOpnameBranchDetailDTO = $this->adjustStockOpnameBranchDetailService->adjustStockOpnameBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $adjustStockOpnameBranchDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Make Adjustment Stock Opname Branch Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeAdjustmentSOBranchDetail(Request $request) {
        try {
            $makeAdjustmentSOBranchDetailDTO = $this->makeAdjustmentSOBranchDetailService->makeAdjustmentSOBranchDetail($request);

            return response()->json([
                'message' => 'Success',
                'data' => $makeAdjustmentSOBranchDetailDTO,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\StockOpname\GetStockOpnameService;
use App\Services\Modules\StockOpname\GetAllStockOpnameService;
use App\Services\Modules\StockOpname\AddStockOpnameService;

class StockOpnameMasterController extends Controller
{
    public function __construct(
        private GetStockOpnameService $getStockOpnameService,
        private GetAllStockOpnameService $getAllStockOpnameService,
        private AddStockOpnameService $addStockOpnameService,
    )
    {}

    /**
     * Get Stock Opname
     * @param Request $request
     *
     */
    public function getStockOpname(Request $request) {
        try {
            $stockOpnameInfoDTO = $this->getStockOpnameService->getStockOpname($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get Stock Opname success',
                'data' => $stockOpnameInfoDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get Stock Opname failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all Stock Opname
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllStockOpname(Request $request) {
        try {
            $stockOpnameInfoDTO = $this->getAllStockOpnameService->getAllStockOpname($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all Stock Opname success',
                'data' => $stockOpnameInfoDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all Stock Opname failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add Stock Opname
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStockOpname(Request $request) {
        try {
            $newStockOpnameDTO = $this->addStockOpnameService->addStockOpname($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add Stock Opname success',
                'data' => $newStockOpnameDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add Stock Opname failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

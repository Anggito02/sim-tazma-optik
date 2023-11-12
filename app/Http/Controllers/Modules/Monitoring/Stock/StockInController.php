<?php

namespace App\Http\Controllers\Modules\Monitoring\Stock;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Monitoring\Stock\GetAllStockInService;

class StockInController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllStockInService $getAllStockInService
    ) {}

    /**
     * Get all stock in
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllStockIn(Request $request) {
        try {
            $stockDTOs = $this->getAllStockInService->getAllStockIn($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all stock in success',
                'data' => $stockDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all stock in failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

}

<?php

namespace App\Http\Controllers\Modules\Monitoring\Stock;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Monitoring\Stock\GetAllStockOutService;

class StockOutController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllStockOutService $getAllStockOutService
    ) {}

    /**
     * Get all stock Out
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllStockOut(Request $request) {
        try {
            $stockDTOs = $this->getAllStockOutService->getAllStockOut($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all stock Out success',
                'data' => $stockDTOs
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all stock Out failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

}

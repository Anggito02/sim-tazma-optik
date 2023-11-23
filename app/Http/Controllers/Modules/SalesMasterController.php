<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\SalesMaster\GetAllSalesMasterService;
use App\Services\Modules\SalesMaster\AddSalesMasterService;
use App\Services\Modules\SalesMaster\UpdateSalesMasterService;

class SalesMasterController extends Controller
{
    public function __construct(
        private GetAllSalesMasterService $getAllSalesMasterService,
        private AddSalesMasterService $addSalesMasterService,
        private UpdateSalesMasterService $updateSalesMasterService,
    )
    {}

    /**
     * Get All Sales Master
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllSalesMaster(Request $request) {
        try {
            $salesMasterInfoDTOs = $this->getAllSalesMasterService->getAllSalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterInfoDTOs,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Add Sales Master
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSalesMaster(Request $request) {
        try {
            $salesMasterDTO = $this->addSalesMasterService->addSalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update Sales Master
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSalesMaster(Request $request) {
        try {
            $salesMasterDTO = $this->updateSalesMasterService->updateSalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\SalesDetail\GetAllSalesDetailService;
use App\Services\Modules\SalesDetail\AddSalesDetailService;
use App\Services\Modules\SalesDetail\EditSalesDetailService;
use App\Services\Modules\SalesDetail\DeleteSalesDetailService;

class SalesDetailController extends Controller
{
    public function __construct(
        private GetAllSalesDetailService $getAllSalesDetailService,
        private AddSalesDetailService $addSalesDetailService,
        private EditSalesDetailService $editSalesDetailService,
        private DeleteSalesDetailService $deleteSalesDetailService,
    )
    {}

    /**
     * Get All Sales Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllSalesDetail(Request $request) {
        try {
            $salesDetailInfoArrays = $this->getAllSalesDetailService->getAllSalesDetail($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesDetailInfoArrays,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Add Sales Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSalesDetail(Request $request) {
        try {
            $salesDetailDTO = $this->addSalesDetailService->addSalesDetail($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesDetailDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Edit Sales Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSalesDetail(Request $request) {
        try {
            $salesDetailDTO = $this->editSalesDetailService->editSalesDetail($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesDetailDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Delete Sales Detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSalesDetail(Request $request) {
        try {
            $salesDetailDTO = $this->deleteSalesDetailService->deleteSalesDetail($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesDetailDTO,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}

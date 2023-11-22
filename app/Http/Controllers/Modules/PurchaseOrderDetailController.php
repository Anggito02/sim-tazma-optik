<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\PurchaseOrderDetail\GetAllPODetailService;
use App\Services\Modules\PurchaseOrderDetail\AddPODetailService;
use App\Services\Modules\PurchaseOrderDetail\GetPODetailService;
use App\Services\Modules\PurchaseOrderDetail\EditPODetailService;
use App\Services\Modules\PurchaseOrderDetail\UpdateStockPODetailService;
use App\Services\Modules\PurchaseOrderDetail\DeletePODetailService;

class PurchaseOrderDetailController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllPODetailService $getAllPODetailService,
        private AddPODetailService $addPODetailService,
        private GetPODetailService $getPODetailService,
        private EditPODetailService $editPODetailService,
        private UpdateStockPODetailService $updateStockPODetailService,
        private DeletePODetailService $deletePODetailService
    ) {}

    /**
     * Get purchase order detail by id
     * @param Request $request
     * @return PurchaseOrderDetailInfoDTO
     */
    public function getPODetail(Request $request) {
        try {
            $poDetailDTO = $this->getPODetailService->getPurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all purchase order detail
     * @param Request $request
     * @return PurchaseOrderDetailInfoDTO[]
     */
    public function getAllPODetail(Request $request) {
        try {
            $poDetailDTO = $this->getAllPODetailService->getAllPurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add purchase order detail
     * @param Request $request
     * @return PurchaseOrderDetai
     */
    public function addPODetail(Request $request) {
        try {
            $poDetailDTO = $this->addPODetailService->addPurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit purchase order detail
     * @param Request $request
     * @return PurchaseOrderDetail
     */
    public function editPODetail(Request $request) {
        try {
            $poDetailDTO = $this->editPODetailService->editPurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Update stock purchase order detail
     * @param Request $request
     * @return PurchaseOrderDetail
     */
    public function updateStockPODetail(Request $request) {
        try {
            $poDetailDTO = $this->updateStockPODetailService->editPurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete purchase order detail
     * @param Request $request
     * @return PurchaseOrderDetail
     */
    public function deletePODetail(Request $request) {
        try {
            $poDetailDTO = $this->deletePODetailService->deletePurchaseOrderDetail($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete purchase order detail success',
                'data' => $poDetailDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete purchase order detail failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

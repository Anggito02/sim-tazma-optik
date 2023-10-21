<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\PurchaseOrder\GetAllPOService;
use App\Services\Modules\PurchaseOrder\GetPOService;
use App\Services\Modules\PurchaseOrder\AddPOService;
use App\Services\Modules\PurchaseOrder\EditPOService;
use App\Services\Modules\PurchaseOrder\DeletePOService;

use App\Services\Modules\PurchaseOrder\GetAllPOWithInfoService;

class PurchaseOrderController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllPOService $getAllPOService,
        private GetPOService $getPOService,
        private AddPOService $addPOService,
        private EditPOService $editPOService,
        private DeletePOService $deletePOService,

        private GetAllPOWithInfoService $getAllPOWithInfoService
    ) {}

    /**
     * Get purchase order by id
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getPO(Request $request) {
        try {
            $poDTO = $this->getPOService->getPurchaseOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get purchase order success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get purchase order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all purchase order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getAllPO(Request $request) {
        try {
            $poDTO = $this->getAllPOService->getAllPurchaseOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all purchase order success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all purchase order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add purchase order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function addPO(Request $request) {
        try {
            $poDTO = $this->addPOService->addPurchaseOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add purchase order success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add purchase order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit purchase order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function editPO(Request $request) {
        try {
            $poDTO = $this->editPOService->editPurchaseOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit purchase order success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit purchase order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete purchase order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function deletePO(Request $request) {
        try {
            $poDTO = $this->deletePOService->deletePurchaseOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete purchase order success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete purchase order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all purchase order with info
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getAllPOWithInfo(Request $request) {
        try {
            $poDTO = $this->getAllPOWithInfoService->getAllPurchaseOrderWithInfo($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all purchase order with info success',
                'data' => $poDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all purchase order with info failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

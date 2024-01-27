<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\SalesMaster\GetSalesMasterByIdService;
use App\Services\Modules\SalesMaster\GetSalesMasterByNoTransaksiService;
use App\Services\Modules\SalesMaster\GetAllSalesMasterService;
use App\Services\Modules\SalesMaster\AddSalesMasterService;
use App\Services\Modules\SalesMaster\UpdateSalesMasterService;
use App\Services\Modules\SalesMaster\VerifySalesMasterService;

use App\Services\Modules\SalesMaster\GetAllSalesMasterKasInService;

class SalesMasterController extends Controller
{
    public function __construct(
        private GetSalesMasterByIdService $getSalesMasterByIdService,
        private GetSalesMasterByNoTransaksiService $getSalesMasterByNoTransaksiService,
        private GetAllSalesMasterService $getAllSalesMasterService,
        private AddSalesMasterService $addSalesMasterService,
        private UpdateSalesMasterService $updateSalesMasterService,
        private VerifySalesMasterService $verifySalesMasterService,

        private GetAllSalesMasterKasInService $getAllSalesMasterKasInService
    )
    {}

    /**
     * Get Sales Master by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSalesMasterById(Request $request) {
        try {
            $salesMasterInfoDTO = $this->getSalesMasterByIdService->getSalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterInfoDTO,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get Sales Master by nomor transaksi
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSalesMasterByNoTransaksi(Request $request) {
        try {
            $salesMasterInfoDTO = $this->getSalesMasterByNoTransaksiService->getSalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterInfoDTO,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

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
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
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
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
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
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Verify Sales Master
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifySalesMaster(Request $request) {
        try {
            $salesMaster = $this->verifySalesMasterService->verifySalesMaster($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMaster,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get All Sales Master Kas In
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllSalesMasterKasIn(Request $request) {
        try {
            $salesMasterKasInDTOs = $this->getAllSalesMasterKasInService->getAllSalesMasterKasIn($request);

            return response()->json([
                'status' => 'success',
                'data' => $salesMasterKasInDTOs,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

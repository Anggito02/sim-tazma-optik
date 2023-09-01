<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Vendor\GetVendorService;
use App\Services\Vendor\GetAllVendorService;
use App\Services\Vendor\AddVendorService;
use App\Services\Vendor\DeleteVendorService;
use App\Services\Vendor\EditVendorService;

class VendorController extends Controller
{
    // Service Providers Contructs
    public function __construct(
        private GetVendorService $getVendorService,
        private GetAllVendorService $getAllVendorService,
        private AddVendorService $addVendorService,
        private DeleteVendorService $deleteVendorService,
        private EditVendorService $editVendorService
    ) {}

    /**
     * Get vendor by id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVendor(Request $request) {
        try {
            $resultData = $this->getVendorService->getVendor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Vendor retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    /**
     * Get all vendor
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllVendor(Request $request) {
        try {
            $resultData = $this->getAllVendorService->getAllVendor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Vendor retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    /**
     * Add vendor
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVendor(Request $request) {
        try {
            $resultData = $this->addVendorService->addVendor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Vendor added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    /**
     * Delete vendor
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVendor(Request $request) {
        try {
            $resultData = $this->deleteVendorService->deleteVendor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Vendor deleted successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    /**
     * Edit vendor
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editVendor(Request $request) {
        try {
            $resultData = $this->editVendorService->editVendor($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Vendor edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

}

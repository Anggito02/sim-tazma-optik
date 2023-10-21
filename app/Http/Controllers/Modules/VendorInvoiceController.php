<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\VendorInvoice\AddVendorInvoiceService;
use App\Services\Modules\VendorInvoice\EditVendorInvoiceService;
use App\Services\Modules\VendorInvoice\DeleteVendorInvoiceService;
use App\Services\Modules\VendorInvoice\GetAllVendorInvoiceService;
use App\Services\Modules\VendorInvoice\GetVendorInvoiceService;

class VendorInvoiceController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddVendorInvoiceService $addVendorInvoiceService,
        private EditVendorInvoiceService $editVendorInvoiceService,
        private DeleteVendorInvoiceService $deleteVendorInvoiceService,
        private GetAllVendorInvoiceService $getAllVendorInvoiceService,
        private GetVendorInvoiceService $getVendorInvoiceService
    ) {}

    /**
     * Get vendor invoice by id
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function getVendorInvoice(Request $request) {
        try {
            $vendorInvoiceDTO = $this->getVendorInvoiceService->getVendorInvoice($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get vendor invoice success',
                'data' => $vendorInvoiceDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get vendor invoice failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all vendor invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function getAllVendorInvoice(Request $request) {
        try {
            $vendorInvoiceDTO = $this->getAllVendorInvoiceService->getAllVendorInvoice($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all vendor invoice success',
                'data' => $vendorInvoiceDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all vendor invoice failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add vendor invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function addVendorInvoice(Request $request) {
        try {
            $vendorInvoiceDTO = $this->addVendorInvoiceService->addVendorInvoice($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add vendor invoice success',
                'data' => $vendorInvoiceDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add vendor invoice failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit vendor invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function editVendorInvoice(Request $request) {
        try {
            $vendorInvoiceDTO = $this->editVendorInvoiceService->editVendorInvoice($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit vendor invoice success',
                'data' => $vendorInvoiceDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit vendor invoice failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete vendor invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function deleteVendorInvoice(Request $request) {
        try {
            $vendorInvoiceDTO = $this->deleteVendorInvoiceService->deleteVendorInvoice($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete vendor invoice success',
                'data' => $vendorInvoiceDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete vendor invoice failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

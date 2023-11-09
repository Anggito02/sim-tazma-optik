<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\BranchItem\GetAllBranchItemService;
use App\Services\Modules\BranchItem\AddBranchItemService;
use App\Services\Modules\BranchItem\UpdateBranchStokService;

class BranchItemController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllBranchItemService $getAllBranchItemService,
        private AddBranchItemService $addBranchItemService,
        private UpdateBranchStokService $updateBranchStokService
    ) {}

    /**
     * Get all branch item
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function getAllBranchItem(Request $request) {
        try {
            $branchItemDTO = $this->getAllBranchItemService->getAllBranchItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all branch item success',
                'data' => $branchItemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all branch item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add new branch item
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function addBranchItem(Request $request) {
        try {
            $branchItemDTO = $this->addBranchItemService->addBranchItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add new branch item success',
                'data' => $branchItemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add new branch item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Update branch stok
     * @param Request $request
     * @return BranchItemInfoDTO
     */
    public function updateBranchStok(Request $request) {
        try {
            $branchItemDTO = $this->updateBranchStokService->updateBranchStok($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Update branch stok success',
                'data' => $branchItemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Update branch stok failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

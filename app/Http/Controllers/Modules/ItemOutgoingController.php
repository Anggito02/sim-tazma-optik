<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\ItemOutgoing\AddItemOutgoingService;
use App\Services\Modules\ItemOutgoing\GetAllItemOutgoingService;

class ItemOutgoingController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddItemOutgoingService $addBranchItemService,
        private GetAllItemOutgoingService $getAllItemOutgoingService
    ) {}

    /**
     * Get all item outgoing
     * @param Request $request
     * @return ItemOutgoingInfoDTO
     */
    public function getAllItemOutgoing(Request $request) {
        try {
            $itemOutgoingDTO = $this->getAllItemOutgoingService->getAllItemOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all item outgoing success',
                'data' => $itemOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all item outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add new item outgoing
     * @param Request $request
     * @return ItemOutgoingDTO
     */
    public function addItemOutgoing(Request $request) {
        try {
            $itemOutgoingDTO = $this->addBranchItemService->addItemOutgoing($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add new item outgoing success',
                'data' => $itemOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add new item outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

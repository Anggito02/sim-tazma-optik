<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\ItemOutgoing\GetAllItemOutgoingService;
use App\Services\Modules\ItemOutgoing\GetItemOutgoingService;
use App\Services\Modules\ItemOutgoing\AddItemOutgoingService;

class ItemOutgoingController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetItemOutgoingService $getItemOutgoingService,
        private GetAllItemOutgoingService $getAllItemOutgoingService,
        private AddItemOutgoingService $addBranchItemService
    ) {}

    /**
     * Get item outgoing
     * @param int $id
     * @return ItemOutgoingInfoDTO
     */
    public function getItemOutgoing(int $id) {
        try {
            $itemOutgoingDTO = $this->getItemOutgoingService->getItemOutgoing($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Get item outgoing success',
                'data' => $itemOutgoingDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get item outgoing failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

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

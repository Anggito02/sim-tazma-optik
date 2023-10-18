<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\ReceiveOrder\GetAllReceiveOrderService;
use App\Services\Modules\ReceiveOrder\GetReceiveOrderService;
use App\Services\Modules\ReceiveOrder\AddReceiveOrderService;
use App\Services\Modules\ReceiveOrder\EditReceiveOrderService;
use App\Services\Modules\ReceiveOrder\DeleteReceiveOrderService;

use App\Services\Modules\ReceiveOrder\GetReceiveOrderWithInfoService;

class ReceiveOrderController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private GetAllReceiveOrderService $getAllReceiveOrderService,
        private GetReceiveOrderService $getReceiveOrderService,
        private AddReceiveOrderService $addReceiveOrderService,
        private EditReceiveOrderService $editReceiveOrderService,
        private DeleteReceiveOrderService $deleteReceiveOrderService,

        private GetReceiveOrderWithInfoService $getReceiveOrderWithInfoService
    ) {}

    /**
     * Get receive order by id
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrder(Request $request) {
        try {
            $receiveOrderDTO = $this->getReceiveOrderService->getReceiveOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get receive order success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get receive order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get all receive order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getAllReceiveOrder(Request $request) {
        try {
            $receiveOrderDTO = $this->getAllReceiveOrderService->getAllReceiveOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get all receive order success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get all receive order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add receive order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function addReceiveOrder(Request $request) {
        try {
            $receiveOrderDTO = $this->addReceiveOrderService->addReceiveOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add receive order success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add receive order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit receive order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function editReceiveOrder(Request $request) {
        try {
            $receiveOrderDTO = $this->editReceiveOrderService->editReceiveOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit receive order success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit receive order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete receive order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function deleteReceiveOrder(Request $request) {
        try {
            $receiveOrderDTO = $this->deleteReceiveOrderService->deleteReceiveOrder($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete receive order success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete receive order failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get receive order with info
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrderWithInfo(Request $request) {
        try {
            $receiveOrderDTO = $this->getReceiveOrderWithInfoService->getReceiveOrderWithInfo($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get receive order with info success',
                'data' => $receiveOrderDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get receive order with info failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

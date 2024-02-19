<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Modules\Item\AddItemService;
use App\Services\Modules\Item\EditItemService;
use App\Services\Modules\Item\DeleteItemService;
use App\Services\Modules\Item\GetItemService;
use App\Services\Modules\Item\GetItemFilteredService;
use App\Services\Modules\Item\GetQRItemService;


class ItemController extends Controller
{
    // Service Providers Constructs
    public function __construct(
        private AddItemService $addItemService,
        private EditItemService $editItemService,
        private DeleteItemService $deleteItemService,
        private GetItemService $getItemService,
        private GetItemFilteredService $getItemFilteredService,
        private GetQRItemService $getQRItemService
    ) {}

    /**
     * Get item by id
     * @param Request $request
     * @return ItemInfoDTO
     */
    public function getItem(Request $request) {
        try {
            $itemDTO = $this->getItemService->getItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get item success',
                'data' => $itemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get item filtered
     * @param Request $request
     * @return ItemDTO
     */
    public function getItemFiltered(Request $request) {
        try {
            $itemDTO = $this->getItemFilteredService->getItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Get item success',
                'data' => $itemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Get QR item
     * @param Request $request
     * @return ItemDTO
     */
    public function getQRItem(Request $request) {
        try {
            $qr_image = $this->getQRItemService->getQRItem($request);

            return response($qr_image)->header('Content-Type', 'image/png');
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Get QR item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Add item
     * @param Request $request
     * @return ItemDTO
     */
    public function addItem(Request $request) {
        try {
            $itemDTO = $this->addItemService->addItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Add item success',
                'data' => $itemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Add item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Edit item
     * @param Request $request
     * @return ItemDTO
     */
    public function editItem(Request $request) {
        try {
            $itemDTO = $this->editItemService->editItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Edit item success',
                'data' => $itemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Edit item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }

    /**
     * Delete item
     * @param Request $request
     * @return ItemDTO
     */
    public function deleteItem(Request $request) {
        try {
            $itemDTO = $this->deleteItemService->deleteItem($request);

            return response()->json([
                'status' => 'success',
                'message' => 'Delete item success',
                'data' => $itemDTO
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete item failed',
                'data' => $error->getMessage()
            ], 400);
        }
    }
}

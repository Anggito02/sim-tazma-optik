<?php

namespace App\Http\Controllers\Modules;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Modules\Item;
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
    // public function getItemFiltered(Request $request) {
    //     try {
    //         $itemDTO = $this->getItemFilteredService->getItem($request);
    //         print_r($itemDTO);
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Get item success',
    //             'data' => $itemDTO
    //         ], 200);
    //     } catch (Exception $error) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Get item failed',
    //             'data' => $error->getMessage()
    //         ], 400);
    //     }
    // }
    public function getItemFiltered(Request $request)
    {
        $limit = $request->input('limit');
        $offset = $request->input('offset', 0);
        $query = Item::query();
        try {
            if ($request->has('jenis_item')) {
                $query->where('items.jenis_item',$request->input('jenis_item'));
            }
            $item = $query ->join('brands', 'items.brand_id', '=', 'brands.id')
                            ->join('vendors', 'items.vendor_id', '=', 'vendors.id')
                            ->join('categories', 'items.category_id', '=', 'categories.id')
                            ->leftJoin('colors', 'items.frame_color_id', '=', 'colors.id')
                            ->leftJoin('indices', 'items.lensa_index_id', '=', 'indices.id')
                            ->select(
                                'items.*',
                                'brands.nama_brand',
                                'vendors.nama_vendor',
                                'categories.nama_kategori',
                                'colors.color_name',
                                'indices.value',
                            )
                            ->limit($limit)
                            ->offset($offset)
                            ->orderBy('items.id', 'asc')
                            ->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Get item success',
                'data' => $item
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

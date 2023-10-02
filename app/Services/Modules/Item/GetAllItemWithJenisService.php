<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemDTO;

use App\Repositories\Modules\Item\GetAllItemWithJenisRepository;

class GetAllItemWithJenisService {
    public function __construct(
        private GetAllItemWithJenisRepository $itemRepository
    ) {}

    /**
     * Get all item
     * @param Request $request
     * @return ItemDTO
     */
    public function getAllItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'jenis_item' => 'required',
                'page' => 'required',
                'limit' => 'required',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Check request',
                'data' => $request->all()
            ], 200);

            $itemDTO = $this->itemRepository->getAllItem($request->jenis_item, $request->page, $request->limit);

            return $itemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

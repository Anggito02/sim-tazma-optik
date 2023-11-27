<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\ItemInfoDTO;

use App\Repositories\Modules\Item\GetItemRepository;

class GetItemService {
    public function __construct(
        private GetItemRepository $itemRepository
    ) {}

    /**
     * Get item
     * @param Request $request
     * @return ItemInfoDTO
     */
    public function getItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $itemDTO = $this->itemRepository->getItem($id);

            $itemArray = $itemDTO->toArray();

            return $itemArray;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemDTO;

use App\Repositories\Modules\Item\DeleteItemRepository;

class DeleteItemService {
    public function __construct(
        private DeleteItemRepository $itemRepository
    ) {}

    /**
     * Delete item
     * @param Request $request
     * @return ItemDTO
     */
    public function deleteItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $itemDTO = $this->itemRepository->deleteItem($id);

            return $itemDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

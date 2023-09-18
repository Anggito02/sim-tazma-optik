<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemDTO;

use App\Repositories\Modules\Item\GetItemRepository;

class GetItemService {
    public function __construct(
        private GetItemRepository $itemRepository
    ) {}

    /**
     * Get item
     * @param Request $request
     * @return ItemDTO
     */
    public function getItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $itemDTO = $this->itemRepository->getItem($id);

            return $itemDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

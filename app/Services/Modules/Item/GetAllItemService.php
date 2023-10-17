<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTO;

use App\Repositories\Modules\Item\GetAllItemRepository;

class GetAllItemService {
    public function __construct(
        private GetAllItemRepository $itemRepository
    ) {}

    /**
     * Get all item
     * @return ItemDTO
     */
    public function getAllItem(Request $request) {
        try {
            $itemDTO = $this->itemRepository->getAllItem();

            return $itemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

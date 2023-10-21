<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\Modules\ItemDTO;
use App\Models\Modules\Item;

class DeleteItemRepository {
    /**
     * Delete item
     * @param int $id
     * @return ItemDTO
     */
    public function deleteItem(int $id) {
        try {
            $item = Item::find($id);
            $item->delete();

            return $item;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}


?>

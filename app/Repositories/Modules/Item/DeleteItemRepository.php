<?php

namespace App\Repositories\Modules\Item;

use Exception;
use Illuminate\Support\Facades\Storage;


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

            if ($item->deleteable == false) {
                throw new Exception('Item cannot be deleted because it is used in purchase order');
            }

            // delete qr code
            Storage::delete($item->qr_path);

            $item->delete();

            return $item;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}


?>

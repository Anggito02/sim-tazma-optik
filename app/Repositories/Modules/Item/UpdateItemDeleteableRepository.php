<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\Models\Modules\Item;

class UpdateItemDeleteableRepository {
    /**
     * Update item deleteable
     * @param int $id
     * @param bool $deleteable
     * @return Item
     */
    public function updateItemDeleteable(int $id, bool $deleteable) {
        try {
            $item = Item::find($id);

            $item->deleteable = $deleteable;

            $item->save();

            return $item;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

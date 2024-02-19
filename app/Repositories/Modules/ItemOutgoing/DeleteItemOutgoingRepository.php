<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\Models\Modules\ItemOutgoing;

class DeleteItemOutgoingRepository {
    /**
     * Delete item outgoing
     * @param int $id
     * @return bool
     */
    public function deleteItemOutgoing(int $id) {
        try {
            $itemOutgoing = ItemOutgoing::where('id', $id)
                ->delete();

            return $itemOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>

<?php

namespace App\Repositories\Modules\Retur;

use Exception;

use App\Models\Modules\Retur;

class DeleteReturRepository {
    /**
     * Delete retur
     * @param int $id
     * @return bool
     */
    public function deleteRetur(int $id) {
        try {
            $itemRetur = Retur::where('id', $id)
                ->delete();

            return $itemRetur;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>

<?php

namespace App\Repositories\Modules\Retur;

use App\Models\Modules\Retur;
use Exception;

class GetLatestReturNumberRepository {
    /**
     * Get latest retur number
     * @return string
     */
    public function getLatestReturNumber() {
        try {
            $returNumber = Retur::latest()->first();

            if (!$returNumber) {
                return null;
            }

            return $returNumber->retur;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

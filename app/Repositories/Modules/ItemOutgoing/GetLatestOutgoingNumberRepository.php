<?php

namespace App\Repositories\Modules\ItemOutgoing;

use App\Models\Modules\ItemOutgoing;
use Exception;

class GetLatestOutgoingNumberRepository {
    /**
     * Get latest outgoing number
     * @return string
     */
    public function getLatestOutgoingNumber() {
        try {
            $outgoingNumber = ItemOutgoing::latest()->first();

            if (!$outgoingNumber) {
                return null;
            }

            return $outgoingNumber->nomor_outgoing;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>

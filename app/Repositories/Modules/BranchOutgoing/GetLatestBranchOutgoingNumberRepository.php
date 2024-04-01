<?php

namespace App\Repositories\Modules\BranchOutgoing;

use App\Models\Modules\BranchOutgoing;
use Exception;

class GetLatestOutgoingNumberRepository {
    /**
     * Get latest outgoing number
     * @return string
     */
    public function getLatestOutgoingNumber() {
        try {
            $outgoingNumber = BranchOutgoing::latest()->first();

            if (!$outgoingNumber) {
                return null;
            }

            return $outgoingNumber->nomor_outgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\OutgoingDetail;

use Exception;

use App\Models\Modules\OutgoingDetail;

class DeleteOutgoingDetailRepository {
    /**
     * Delete outgoing detail
     * @param int $id
     * @return bool
     */
    public function deleteOutgoingDetail(int $id) {
        try {
            $outgoingDetail = OutgoingDetail::where('id', $id)
                ->delete();

            return $outgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

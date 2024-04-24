<?php

namespace App\Repositories\Modules\ReturDetail;

use Exception;

use App\Models\Modules\ReturDetail;

class DeleteReturDetailRepository {
    /**
     * Delete outgoing detail
     * @param int $id
     * @return bool
     */
    public function deleteReturDetail(int $id) {
        try {
            $outgoingDetail = ReturDetail::where('id', $id)
                ->delete();

            return $outgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\ReturDetail;

use Exception;

use App\Models\Modules\ReturDetail;

class VerifyReturDetailRepository {
    /**
     * Verify retur detail
     * @param int $returDetailId
     * @return ReturDetail
     */
    public function verifyReturDetail(int $returDetailId) {
        try {
            $returDetail = ReturDetail::find($returDetailId);
            $returDetail->verified_at = date('Y-m-d H:i:s');
            $returDetail->verified_status = true;
            $returDetail->save();

            return $returDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

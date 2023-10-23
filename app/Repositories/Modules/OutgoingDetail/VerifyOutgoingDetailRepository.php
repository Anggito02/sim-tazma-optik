<?php

namespace App\Repositories\Modules\OutgoingDetail;

use Exception;

use App\Models\Modules\OutgoingDetail;

class VerifyOutgoingDetailRepository {
    /**
     * Verify outgoing detail
     * @param int $outgoingDetailId
     * @return OutgoingDetail
     */
    public function verifyOutgoingDetail(int $outgoingDetailId) {
        try {
            $outgoingDetail = OutgoingDetail::find($outgoingDetailId);
            $outgoingDetail->verified_at = date('Y-m-d H:i:s');
            $outgoingDetail->verified_status = true;
            $outgoingDetail->save();

            return $outgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

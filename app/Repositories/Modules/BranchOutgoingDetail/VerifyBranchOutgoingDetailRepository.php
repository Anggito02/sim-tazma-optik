<?php

namespace App\Repositories\Modules\BranchOutgoingDetail;

use Exception;

use App\Models\Modules\BranchOutgoingDetail;

class VerifyBranchOutgoingDetailRepository {
    /**
     * Verify branch outgoing detail
     * @param int $branchOutgoingDetailId
     * @return BranchOutgoingDetail
     */
    public function verifyBranchOutgoingDetail(int $branchOutgoingDetailId) {
        try {
            $branchOutgoingDetail = BranchOutgoingDetail::find($branchOutgoingDetailId);
            $branchOutgoingDetail->verified_at = date('Y-m-d H:i:s');
            $branchOutgoingDetail->verified_status = true;
            $branchOutgoingDetail->save();

            return $branchOutgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

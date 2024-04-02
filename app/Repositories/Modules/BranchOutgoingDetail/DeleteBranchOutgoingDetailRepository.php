<?php

namespace App\Repositories\Modules\BranchOutgoingDetail;

use Exception;

use App\Models\Modules\BranchOutgoingDetail;

class DeleteBranchOutgoingDetailRepository {
    /**
     * Delete branch outgoing detail
     * @param int $id
     * @return bool
     */
    public function deleteBranchOutgoingDetail(int $id) {
        try {
            $branchOutgoingDetail = BranchOutgoingDetail::where('id', $id)
                ->delete();

            return $branchOutgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

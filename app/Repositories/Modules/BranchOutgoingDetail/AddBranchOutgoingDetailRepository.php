<?php

namespace App\Repositories\Modules\BranchOutgoingDetail;

use Exception;

use App\DTO\Modules\BranchOutgoingDetailDTOs\NewBranchOutgoingDetailDTO;
use App\Models\Modules\BranchOutgoingDetail;

class AddBranchOutgoingDetailRepository {
    /**
     * Add new branch outgoing detail
     * @param NewBranchOutgoingDetailDTO $newBranchOutgoingDetailDTO
     * @return BranchOutgoingDetail
     */
    public function addBranchOutgoingDetail(NewBranchOutgoingDetailDTO $newBranchOutgoingDetailDTO) {
        try {
            $branchOutgoingDetail = BranchOutgoingDetail::create([
                'delivered_qty' => $newBranchOutgoingDetailDTO->getDeliveredQty(),

                'branch_outgoing_id' => $newBranchOutgoingDetailDTO->getBranchOutgoingId(),
                'item_id' => $newBranchOutgoingDetailDTO->getItemId(),
                'branch_from_id' => $newBranchOutgoingDetailDTO->getBranchFromId(),
                'branch_to_id' => $newBranchOutgoingDetailDTO->getBranchToId(),
                'verified_by' => $newBranchOutgoingDetailDTO->getVerifiedBy(),
            ]);

            return $branchOutgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

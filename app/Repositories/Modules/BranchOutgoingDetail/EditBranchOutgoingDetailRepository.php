<?php

namespace App\Repositories\Modules\BranchOutgoingDetail;

use Exception;

use App\DTO\Modules\BranchOutgoingDetailDTOs\EditBranchOutgoingDetailDTO;

use App\Models\Modules\BranchOutgoingDetail;

class EditBranchOutgoingDetailRepository {
    /**
     * Edit branch outgoing detail
     * @param EditBranchOutgoingDetailDTO $editBranchOutgoingDetailDTO
     * @return BranchOutgoingDetail
     */
    public function editBranchOutgoingDetail(EditBranchOutgoingDetailDTO $editBranchOutgoingDetailDTO) {
        try {
            $branchOutgoingDetail = BranchOutgoingDetail::where('id', $editBranchOutgoingDetailDTO->getId())
                ->update([
                    'delivered_qty' => $editBranchOutgoingDetailDTO->getDeliveredQty(),
                    'item_id' => $editBranchOutgoingDetailDTO->getItemId(),
                    'branch_from_id' => $editBranchOutgoingDetailDTO->getBranchFromId(),
                    'branch_to_id' => $editBranchOutgoingDetailDTO->getBranchToId(),
                    'verified_by' => $editBranchOutgoingDetailDTO->getVerifiedBy(),
                ]);

            return $branchOutgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

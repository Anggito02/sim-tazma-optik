<?php

namespace App\Repositories\Modules\BranchOutgoing;

use Exception;

use App\DTO\Modules\BranchOutgoingDTOs\EditBranchOutgoingDTO;

use App\Models\Modules\BranchOutgoing;

class EditBranchOutgoingRepository {
    /**
     * Edit branch outgoing
     * @param EditBranchOutgoingDTO $editBranchOutgoingDTO
     * @return BranchOutgoingDTO
     */
    public function editBranchOutgoing(EditBranchOutgoingDTO $editBranchOutgoingDTO) {
        try {
            $branchOutgoing = BranchOutgoing::where('id', $editBranchOutgoingDTO->getId())
                ->update([
                    'tanggal_pengiriman' => $editBranchOutgoingDTO->getTanggalPengiriman(),

                    'branch_from_id' => $editBranchOutgoingDTO->getBranchFromId(),
                    'branch_to_id' => $editBranchOutgoingDTO->getBranchToId(),

                    'known_by' => $editBranchOutgoingDTO->getKnownBy(),
                    'checked_by' => $editBranchOutgoingDTO->getCheckedBy(),
                    'approved_by' => $editBranchOutgoingDTO->getApprovedBy(),
                    'delivered_by' => $editBranchOutgoingDTO->getDeliveredBy(),
                    'received_by' => $editBranchOutgoingDTO->getReceivedBy(),
                ]);

            return $branchOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\BranchOutgoing;

use Exception;

use App\DTO\Modules\BranchOutgoingDTOs\NewBranchOutgoingDTO;
use App\Models\Modules\BranchOutgoing;

class AddBranchOutgoingRepository {
    /**
     * Add new branch outgoing
     * @param NewBranchOutgoingDTO $newBranchOutgoingDTO
     * @return BranchOutgoing
     */
    public function addBranchOutgoing(NewBranchOutgoingDTO $newBranchOutgoingDTO) {
        try {
            $branchOutgoing = BranchOutgoing::create([
                'nomor_outgoing' => $newBranchOutgoingDTO->getNomorOutgoing(),
                'tanggal_outgoing' => $newBranchOutgoingDTO->getTanggalOutgoing(),
                'tanggal_pengiriman' => $newBranchOutgoingDTO->getTanggalPengiriman(),

                'branch_from_id' => $newBranchOutgoingDTO->getBranchFromId(),
                'branch_to_id' => $newBranchOutgoingDTO->getBranchToId(),

                'known_by' => $newBranchOutgoingDTO->getKnownBy(),
                'checked_by' => $newBranchOutgoingDTO->getCheckedBy(),
                'approved_by' => $newBranchOutgoingDTO->getApprovedBy(),
                'delivered_by' => $newBranchOutgoingDTO->getDeliveredBy(),
                'received_by' => $newBranchOutgoingDTO->getReceivedBy(),
            ]);

            return $branchOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

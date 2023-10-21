<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\DTO\Modules\ItemOutgoingDTOs\NewItemOutgoingDTO;
use App\Models\Modules\ItemOutgoing;

class AddItemOutgoingRepository {
    /**
     * Add new item outgoing
     * @param NewItemOutgoingDTO $newItemOutgoingDTO
     * @return ItemOutgoing
     */
    public function addItemOutgoing(NewItemOutgoingDTO $newItemOutgoingDTO) {
        try {
            $itemOutgoing = ItemOutgoing::create([
                'nomor_outgoing' => $newItemOutgoingDTO->getNomorOutgoing(),
                'tanggal_outgoing' => $newItemOutgoingDTO->getTanggalOutgoing(),
                'tanggal_pengiriman' => $newItemOutgoingDTO->getTanggalPengiriman(),

                'branch_id' => $newItemOutgoingDTO->getBranchId(),

                'known_by' => $newItemOutgoingDTO->getKnownBy(),
                'checked_by' => $newItemOutgoingDTO->getCheckedBy(),
                'approved_by' => $newItemOutgoingDTO->getApprovedBy(),
                'delivered_by' => $newItemOutgoingDTO->getDeliveredBy(),
            ]);

            return $itemOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

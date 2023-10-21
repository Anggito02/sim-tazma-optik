<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\DTO\Modules\ItemOutgoingDTOs\EditItemOutgoingDTO;

use App\Models\Modules\ItemOutgoing;

class EditItemOutgoingRepository {
    /**
     * Edit item outgoing
     * @param EditItemOutgoingDTO $editItemOutgoingDTO
     * @return ItemOutgoingDTO
     */
    public function editItemOutgoing(EditItemOutgoingDTO $editItemOutgoingDTO) {
        try {
            $itemOutgoing = ItemOutgoing::where('id', $editItemOutgoingDTO->getId())
                ->update([
                    'tanggal_pengiriman' => $editItemOutgoingDTO->getTanggalPengiriman(),

                    'branch_id' => $editItemOutgoingDTO->getBranchId(),

                    'known_by' => $editItemOutgoingDTO->getKnownBy(),
                    'checked_by' => $editItemOutgoingDTO->getCheckedBy(),
                    'approved_by' => $editItemOutgoingDTO->getApprovedBy(),
                    'delivered_by' => $editItemOutgoingDTO->getDeliveredBy(),
                ]);

            return $itemOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

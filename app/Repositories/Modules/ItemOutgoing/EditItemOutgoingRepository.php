<?php

namespace App\Repositories\Modules\ItemOutgoing;

use Exception;

use App\DTO\Modules\ItemOutgoingDTOs\EditItemOutgoingDTO;
use App\DTO\Modules\ItemOutgoingDTOs\ItemOutgoingInfoDTO;
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

                    'packed_by' => $editItemOutgoingDTO->getPackedBy(),
                    'checked_by' => $editItemOutgoingDTO->getCheckedBy(),
                    'approved_by' => $editItemOutgoingDTO->getApprovedBy(),
                ]);

            $itemOutgoingDTO = new ItemOutgoingInfoDTO(
                $itemOutgoing->id,
                $itemOutgoing->nomor_outgoing,
                $itemOutgoing->tanggal_outgoing,
                $itemOutgoing->tanggal_pengiriman,

                $itemOutgoing->branch_id,
                $itemOutgoing->branch_nama,

                $itemOutgoing->packed_by,
                $itemOutgoing->packed_by_nama,

                $itemOutgoing->checked_by,
                $itemOutgoing->checked_by_nama,

                $itemOutgoing->approved_by,
                $itemOutgoing->approved_by_nama,
            );

            return $itemOutgoing;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\Retur;

use Exception;

use App\DTO\Modules\ReturDTOs\EditReturDTO;

use App\Models\Modules\Retur;

class EditReturRepository {
    /**
     * Edit retur
     * @param EditReturDTO $editReturDTO
     * @return ReturDTO
     */
    public function editRetur(EditReturDTO $editReturDTO) {
        try {
            $itemRetur = Retur::where('id', $editReturDTO->getId())
                ->update([
                    'tanggal_pengiriman' => $editReturDTO->getTanggalPengiriman(),

                    'branch_id' => $editReturDTO->getBranchId(),

                    'checked_by' => $editReturDTO->getCheckedBy(),
                    'approved_by' => $editReturDTO->getApprovedBy(),
                    'delivered_by' => $editReturDTO->getDeliveredBy(),
                    'received_by' => $editReturDTO->getReceivedBy(),
                ]);

            return $itemRetur;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\Retur;

use Exception;

use App\DTO\Modules\ReturDTOs\NewReturDTO;
use App\Models\Modules\Retur;

class AddReturRepository {
    /**
     * Add new retur
     * @param NewReturDTO $newReturDTO
     * @return Retur
     */
    public function addRetur(NewReturDTO $newReturDTO) {
        try {
            $retur = Retur::create([
                'nomor_retur' => $newReturDTO->getNomorRetur(),
                'tanggal_retur' => $newReturDTO->getTanggalRetur(),
                'tanggal_pengiriman' => $newReturDTO->getTanggalPengiriman(),

                'branch_id' => $newReturDTO->getBranchId(),

                'checked_by' => $newReturDTO->getCheckedBy(),
                'approved_by' => $newReturDTO->getApprovedBy(),
                'delivered_by' => $newReturDTO->getDeliveredBy(),
                'received_by' => $newReturDTO->getReceivedBy(),
            ]);

            return $retur;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\ReturDetail;

use Exception;

use App\DTO\Modules\ReturDetailDTOs\NewReturDetailDTO;
use App\Models\Modules\ReturDetail;

class AddReturDetailRepository {
    /**
     * Add new retur detail
     * @param NewReturDetailDTO $newReturDetailDTO
     * @return ReturDetail
     */
    public function addReturDetail(NewReturDetailDTO $newReturDetailDTO) {
        try {
            $returDetail = ReturDetail::create([
                'delivered_qty' => $newReturDetailDTO->getDeliveredQty(),

                'retur_id' => $newReturDetailDTO->getReturId(),
                'item_id' => $newReturDetailDTO->getItemId(),
                'verified_by' => $newReturDetailDTO->getVerifiedBy(),
            ]);

            return $returDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

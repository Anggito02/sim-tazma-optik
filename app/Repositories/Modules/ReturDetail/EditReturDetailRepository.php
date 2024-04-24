<?php

namespace App\Repositories\Modules\ReturDetail;

use Exception;

use App\DTO\Modules\ReturDetailDTOs\EditReturDetailDTO;

use App\Models\Modules\ReturDetail;

class EditReturDetailRepository {
    /**
     * Edit retur detail
     * @param EditReturDetailDTO $editReturDetailDTO
     * @return ReturDetail
     */
    public function editReturDetail(EditReturDetailDTO $editReturDetailDTO) {
        try {
            $returDetail = ReturDetail::where('id', $editReturDetailDTO->getId())
                ->update([
                    'delivered_qty' => $editReturDetailDTO->getDeliveredQty(),
                    'item_id' => $editReturDetailDTO->getItemId(),
                    'verified_by' => $editReturDetailDTO->getVerifiedBy(),
                ]);

            return $returDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

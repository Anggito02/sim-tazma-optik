<?php

namespace App\Repositories\Modules\OutgoingDetail;

use Exception;

use App\DTO\Modules\OutgoingDetailDTOs\EditOutgoingDetailDTO;

use App\Models\Modules\OutgoingDetail;

class EditOutgoingDetailRepository {
    /**
     * Edit outgoing detail
     * @param EditOutgoingDetailDTO $editOutgoingDetailDTO
     * @return OutgoingDetail
     */
    public function editOutgoingDetail(EditOutgoingDetailDTO $editOutgoingDetailDTO) {
        try {
            $outgoingDetail = OutgoingDetail::where('id', $editOutgoingDetailDTO->getId())
                ->update([
                    'delivered_qty' => $editOutgoingDetailDTO->getDeliveredQty(),
                    'item_id' => $editOutgoingDetailDTO->getItemId(),
                    'verified_by' => $editOutgoingDetailDTO->getVerifiedBy(),
                ]);

            return $outgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

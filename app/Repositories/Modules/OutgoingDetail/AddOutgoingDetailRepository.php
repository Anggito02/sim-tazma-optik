<?php

namespace App\Repositories\Modules\OutgoingDetail;

use Exception;

use App\DTO\Modules\OutgoingDetailDTOs\NewOutgoingDetailDTO;
use App\Models\Modules\OutgoingDetail;

class AddOutgoingDetailRepository {
    /**
     * Add new outgoing detail
     * @param NewOutgoingDetailDTO $newOutgoingDetailDTO
     * @return OutgoingDetail
     */
    public function addOutgoingDetail(NewOutgoingDetailDTO $newOutgoingDetailDTO) {
        try {
            $outgoingDetail = OutgoingDetail::create([
                'delivered_qty' => $newOutgoingDetailDTO->getDeliveredQty(),

                'outgoing_id' => $newOutgoingDetailDTO->getOutgoingId(),
                'item_id' => $newOutgoingDetailDTO->getItemId(),
                'verified_by' => $newOutgoingDetailDTO->getVerifiedBy(),
            ]);

            return $outgoingDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

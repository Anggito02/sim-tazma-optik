<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetail\UpdateStockPODetailDTO;
use App\Models\Modules\PurchaseOrderDetail;

class UpdateStockPODetailRepository {
    /**
     * Edit Purchase Order Detail
     * @param UpdateStockPODetailDTO $purchaseOrderDetailDTO
     * @return PurchaseOrderDetailDTO
     */
    public function editPurchaseOrderDetail(UpdateStockPODetailDTO $poDetailDto) {
        try {
            $poDetail = PurchaseOrderDetail::find($poDetailDto->getId());

            $poDetail->received_qty = $poDetailDto->getReceiveQty();
            $poDetail->not_good_qty = $poDetailDto->getNotGoodQty();
            $poDetail->save();

            return $poDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetailDTO;
use App\Models\Modules\PurchaseOrderDetail;

class AddPODetailRepository {
    /**
     * Add Purchase Order Detail
     * @param PurchaseOrderDetailDTO $purchaseOrderDetailDTO
     * @return PurchaseOrderDetailDTO
     */
    public function addPurchaseOrderDetail(PurchaseOrderDetailDTO $poDetailDto) {
        try {
            $poDetail = new PurchaseOrderDetail();
            $poDetail->pre_order_qty = $poDetailDto->getPreOrderQty();
            $poDetail->unit = $poDetailDto->getUnit();
            $poDetail->harga_beli_satuan = $poDetailDto->getHargaBeliSatuan();
            $poDetail->harga_jual_satuan = $poDetailDto->getHargaJualSatuan();
            $poDetail->diskon = $poDetailDto->getDiskon();

            $poDetail->purchase_order_id = $poDetailDto->getPurchaseOrderId();

            $poDetail->item_id = $poDetailDto->getItemId();
            $poDetail->save();

            return $poDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

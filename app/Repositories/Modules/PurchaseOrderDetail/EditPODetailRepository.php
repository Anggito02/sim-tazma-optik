<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailDTO;
use App\Models\Modules\PurchaseOrderDetail;

class EditPODetailRepository {
    /**
     * Edit Purchase Order Detail
     * @param PurchaseOrderDetailDTO $purchaseOrderDetailDTO
     * @return PurchaseOrderDetailDTO
     */
    public function editPurchaseOrderDetail(PurchaseOrderDetailDTO $poDetailDto) {
        try {
            $poDetail = PurchaseOrderDetail::find($poDetailDto->id);

            $poDetail->pre_order_qty = $poDetailDto->getPreOrderQty();
            $poDetail->unit = $poDetailDto->getUnit();
            $poDetail->harga_beli_satuan = $poDetailDto->getHargaBeliSatuan();
            $poDetail->harga_jual_satuan = $poDetailDto->getHargaJualSatuan();
            $poDetail->diskon = $poDetailDto->getDiskon();

            $poDetail->item_id = $poDetailDto->getItemId();

            $poDetail->save();

            return $poDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

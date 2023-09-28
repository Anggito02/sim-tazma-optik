<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetailDTO;
use App\Models\Modules\PurchaseOrderDetail;

class GetPODetailRepository {
    /**
     * Get Purchase Order Detail
     * @param int $id
     * @return PurchaseOrderDetailDTO
     */
    public function getPurchaseOrderDetail(int $id) {
        try {
            $poDetail = PurchaseOrderDetail::find($id);

            $poDetailDTO = new PurchaseOrderDetailDTO(
                $poDetail->id,
                $poDetail->pre_order_qty,
                $poDetail->received_qty,
                $poDetail->not_good_qty,
                $poDetail->unit,
                $poDetail->harga_beli_satuan,
                $poDetail->harga_jual_satuan,
                $poDetail->diskon,
                $poDetail->purchase_order_id,
                $poDetail->item_id,
            );

            return $poDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailInfoDTO;
use App\Models\Modules\PurchaseOrderDetail;

class GetPODetailRepository {
    /**
     * Get Purchase Order Detail
     * @param int $id
     * @return PurchaseOrderDetailInfoDTO
     */
    public function getPurchaseOrderDetail(int $id) {
        try {
            $poDetail = PurchaseOrderDetail::join('items', 'purchase_order_details.item_id', '=', 'items.id')
                ->join('purchase_orders', 'purchase_order_details.purchase_order_id', '=', 'purchase_orders.id')
                ->join('receive_orders', 'purchase_order_details.receive_order_id', '=', 'receive_orders.id')
                ->select(
                    'purchase_order_details.*', 'items.kode_item as kode_item',
                    'items.kode_item as kode_item',
                    'purchase_orders.nomor_po as nomor_po',
                    'receive_orders.nomor_receive_order as nomor_receive_order'
                    )
                ->where('purchase_order_details.id', '=', $id)
                ->first();

            $poDetailDTO = new PurchaseOrderDetailInfoDTO(
                $poDetail->id,
                $poDetail->pre_order_qty,
                $poDetail->received_qty,
                $poDetail->not_good_qty,
                $poDetail->unit,
                $poDetail->harga_beli_satuan,
                $poDetail->harga_jual_satuan,
                $poDetail->diskon,
                $poDetail->qr_item_path,
                $poDetail->purchase_order_id,
                $poDetail->nomor_po,
                $poDetail->receive_order_id,
                $poDetail->nomor_receive_order,
                $poDetail->item_id,
                $poDetail->kode_item,
            );

            return $poDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

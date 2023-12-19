<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailInfoDTO;
use App\Models\Modules\PurchaseOrderDetail;

class GetAllPODetailRepository {
    /**
     * Get All Purchase Order Detail
     * @param int $page
     * @param int $limit
     * @param int $poId
     * @return PurchaseOrderDetailInfoDTO[]
     */
    public function getAllPurchaseOrderDetail(int $page, int $limit, int $poId) {
        try {
            // use pagination
            // join with item
            $poDetails = PurchaseOrderDetail::where('purchase_order_details.purchase_order_id', '=', $poId)
                ->join('items', 'purchase_order_details.item_id', '=', 'items.id')
                ->join('purchase_orders', 'purchase_order_details.purchase_order_id', '=', 'purchase_orders.id')
                ->leftJoin('receive_orders', 'purchase_order_details.receive_order_id', '=', 'receive_orders.id')
                ->select(
                    'purchase_order_details.*',
                    'items.kode_item as kode_item',
                    'items.kode_item as kode_item',
                    'purchase_orders.nomor_po as nomor_po',
                    'receive_orders.nomor_receive_order as nomor_receive_order'
                    )
                ->paginate($limit, ['*'], 'page', $page);

            $poDetailDTOs = [];

            foreach ($poDetails as $poDetail) {
                $poDetailDTO = new PurchaseOrderDetailInfoDTO(
                    $poDetail->id,
                    $poDetail->pre_order_qty,
                    $poDetail->received_qty,
                    $poDetail->not_good_qty,
                    $poDetail->unit,
                    $poDetail->harga_beli_satuan,
                    $poDetail->harga_jual_satuan,
                    $poDetail->diskon,
                    $poDetail->kode_qr_po_detail,
                    $poDetail->qr_item_path,
                    $poDetail->purchase_order_id,
                    $poDetail->nomor_po,
                    $poDetail->receive_order_id,
                    $poDetail->nomor_receive_order,
                    $poDetail->item_id,
                    $poDetail->kode_item,
                );

                array_push($poDetailDTOs, $poDetailDTO);
            }

            return $poDetailDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

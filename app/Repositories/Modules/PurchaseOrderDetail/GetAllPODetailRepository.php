<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\DTO\Modules\PurchaseOrderDetailDTO;
use App\Models\Modules\PurchaseOrderDetail;

class GetAllPODetailRepository {
    /**
     * Get All Purchase Order Detail
     * @param int $page
     * @param int $limit
     * @param int $poId
     * @return PurchaseOrderDetailDTO
     */
    public function getAllPurchaseOrderDetail(int $page, int $limit, int $poId) {
        try {
            // use pagination
            // join with item
            $poDetails = PurchaseOrderDetail::where('purchase_order_id', '=', $poId)
                ->join('items', 'purchase_order_details.item_id', '=', 'items.id')
                ->select('purchase_order_details.*', 'items.kode_item as kode_item')
                ->paginate($limit, ['*'], 'page', $page);

            $poDetailDTOs = [];

            foreach ($poDetails as $poDetail) {
                $poDetailDTO = [
                    'id' => $poDetail->id,
                    'pre_order_qty' => $poDetail->pre_order_qty,
                    'received_qty' => $poDetail->received_qty,
                    'not_good_qty' => $poDetail->not_good_qty,
                    'unit' => $poDetail->unit,
                    'harga_beli_satuan' => $poDetail->harga_beli_satuan,
                    'harga_jual_satuan' => $poDetail->harga_jual_satuan,
                    'diskon' => $poDetail->diskon,
                    'purchase_order_id' => $poDetail->purchase_order_id,
                    'receive_order_id' => $poDetail->receive_order_id,
                    'item_id' => $poDetail->item_id,
                    'kode_item' => $poDetail->kode_item,
                ];

                array_push($poDetailDTOs, $poDetailDTO);
            }

            return $poDetailDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

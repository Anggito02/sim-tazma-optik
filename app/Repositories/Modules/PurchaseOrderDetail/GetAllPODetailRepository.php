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
     * @return PurchaseOrderDetailDTO
     */
    public function getAllPurchaseOrderDetail(int $page, int $limit) {
        try {
            // use pagination
            $poDetails = PurchaseOrderDetail::paginate($limit, ['*'], 'page', $page);

            $poDetailDTOs = [];
            foreach ($poDetails as $poDetail) {
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
                    $poDetail->item_id
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

<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;
use App\Models\Modules\PurchaseOrder;

class GetAllPORepository {
    /**
     * Get all Purchase Order
     * @param int $page
     * @param int $limit
     * @return PurchaseOrderDTO
     */
    public function getAllPurchaseOrder(int $page, int $limit) {
        try {
            // use pagination
            $pos = PurchaseOrder::paginate($limit, ['*'], 'page', $page);

            $poDTOs = [];
            foreach ($pos as $po) {
                $poDTO = new PurchaseOrderDTO(
                    $po->id,
                    $po->nomor_po,
                    $po->qty,
                    $po->unit,
                    $po->harga_beli_satuan,
                    $po->harga_jual_satuan,
                    $po->diskon,
                    $po->status_po,
                    $po->status_penerimaan,
                    $po->status_pembayaran,
                    $po->vendor_id,
                    $po->item_id,
                    $po->made_by,
                    $po->checked_by,
                    $po->approved_by,
                );

                array_push($poDTOs, $poDTO);
            }

            return $poDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

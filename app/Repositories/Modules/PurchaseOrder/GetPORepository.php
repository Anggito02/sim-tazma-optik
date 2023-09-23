<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;
use App\Models\Modules\PurchaseOrder;

class GetPORepository {
    /**
     * Get Purchase Order
     * @param int $id
     * @return PurchaseOrderDTO
     */
    public function getPurchaseOrder(int $id) {
        try {
            $po = PurchaseOrder::find($id);

            $poDTO = new PurchaseOrderDTO(
                $po->id,
                $po->nomor_po,
                $po->tanggal_dibuat,
                $po->status_po,
                $po->status_penerimaan,
                $po->status_pembayaran,
                $po->vendor_id,
                $po->made_by,
                $po->checked_by,
                $po->approved_by,
            );

            return $poDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Models\Modules\PurchaseOrder;

class GetLatestPORepository {
    /**
     * Get latest PO
     * @return PurchaseOrderDTO
     */
    public function getLatestPO() {
        try {
            $po = PurchaseOrder::latest()->first();

            if (!$po) {
                return null;
            }

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
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

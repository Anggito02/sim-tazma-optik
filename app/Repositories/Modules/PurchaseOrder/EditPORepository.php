<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTOs\EditPODTO;
use App\Models\Modules\PurchaseOrder;

class EditPORepository {
    /**
     * Edit Purchase Order
     * @param EditPODTO $purchaseOrderDTO
     * @return PurchaseOrder
     */
    public function editPurchaseOrder(EditPODTO $PoDto) {
        try {
            $po = PurchaseOrder::find($PoDto->getId());
            $po->status_po = $PoDto->getStatusPo();
            $po->status_penerimaan = $PoDto->getStatusPenerimaan();
            $po->status_pembayaran = $PoDto->getStatusPembayaran();

            $po->vendor_id = $PoDto->getVendorId();

            $po->made_by = $PoDto->getMadeBy();
            $po->checked_by = $PoDto->getCheckedBy();
            $po->approved_by = $PoDto->getApprovedBy();
            $po->save();

            return $po;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

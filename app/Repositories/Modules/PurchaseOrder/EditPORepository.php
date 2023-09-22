<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;
use App\Models\Modules\PurchaseOrder;

class EditPORepository {
    /**
     * Edit Purchase Order
     * @param PurchaseOrderDTO $purchaseOrderDTO
     * @return PurchaseOrderDTO
     */
    public function editPurchaseOrder(PurchaseOrderDTO $PoDto) {
        try {
            $po = PurchaseOrder::find($PoDto->id);
            $po->qty = $PoDto->getQty();
            $po->unit = $PoDto->getUnit();
            $po->harga_beli_satuan = $PoDto->getHargaBeliSatuan();
            $po->harga_jual_satuan = $PoDto->getHargaJualSatuan();
            $po->diskon = $PoDto->getDiskon();
            $po->status_po = $PoDto->getStatusPo();
            $po->status_penerimaan = $PoDto->getStatusPenerimaan();
            $po->status_pembayaran = $PoDto->getStatusPembayaran();

            $po->vendor_id = $PoDto->getVendorId();

            $po->item_id = $PoDto->getItemId();

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

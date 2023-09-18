<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;
use App\Models\Modules\PurchaseOrder;


class AddPORepository {
    /**
     * Add Purchase Order
     * @param PurchaseOrderDTO $purchaseOrderDTO
     * @return PurchaseOrderDTO
     */
    public function addPurchaseOrder(PurchaseOrderDTO $PoDto) {
        try {
            $newPo = new PurchaseOrder();
            $newPo->nomor_po = $PoDto->getNomorPo();
            $newPo->qty = $PoDto->getQty();
            $newPo->unit = $PoDto->getUnit();
            $newPo->harga_beli_satuan = $PoDto->getHargaBeliSatuan();
            $newPo->harga_jual_satuan = $PoDto->getHargaJualSatuan();
            $newPo->diskon = $PoDto->getDiskon();
            $newPo->status_po = $PoDto->getStatusPo();
            $newPo->status_penerimaan = $PoDto->getStatusPenerimaan();
            $newPo->status_pembayaran = $PoDto->getStatusPembayaran();

            $newPo->vendor_id = $PoDto->getVendorId();

            $newPo->item_id = $PoDto->getItemId();

            $newPo->made_by = $PoDto->getMadeBy();
            $newPo->checked_by = $PoDto->getCheckedBy();
            $newPo->approved_by = $PoDto->getApprovedBy();
            $newPo->save();

            return $newPo;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>

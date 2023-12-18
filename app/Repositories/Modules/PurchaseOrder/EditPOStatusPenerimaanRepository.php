<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\Models\Modules\PurchaseOrder;

class EditPOStatusPenerimaanRepository {
    /**
     * Edit Purchase Order Status Penerimaan
     * @param int $id
     * @param bool $status_penerimaan
     * @return PurchaseOrder
     */
    public function editPurchaseOrderStatusPenerimaan(int $id, bool $status_penerimaan) {
        try {
            $po = PurchaseOrder::find($id);
            $po->status_penerimaan = $status_penerimaan;
            $po->save();

            return $po;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}



?>

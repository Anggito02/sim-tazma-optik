<?php

namespace App\Repositories\Modules\PurchaseOrder;

use Exception;

use App\DTO\Modules\PurchaseOrderDTO;
use App\Models\Modules\PurchaseOrder;

class DeletePORepository {
    /**
     * Delete Purchase Order
     * @param int $id
     * @return PurchaseOrderDTO
     */
    public function deletePurchaseOrder(int $id) {
        try {
            $po = PurchaseOrder::find($id);
            $po->delete();

            return $po;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

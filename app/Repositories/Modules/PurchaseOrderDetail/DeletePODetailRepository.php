<?php

namespace App\Repositories\Modules\PurchaseOrderDetail;

use Exception;

use App\Models\Modules\PurchaseOrderDetail;

class DeletePODetailRepository {
    /**
     * Delete Purchase Order Detail
     * @param int $id
     * @return PurchaseOrderDetail
     */
    public function deletePurchaseOrderDetail(int $id) {
        try {
            $poDetail = PurchaseOrderDetail::find($id);
            $poDetail->delete();

            return $poDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

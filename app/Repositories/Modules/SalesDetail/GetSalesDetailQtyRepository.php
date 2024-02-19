<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

class GetSalesDetailQtyRepository {
    /**
     * Get Sales Detail Qty
     * @param int $id
     * @return int
     */
    public function getSalesDetailQty(int $id) {
        try {
            $salesDetail = SalesDetail::find($id);

            return $salesDetail->qty;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

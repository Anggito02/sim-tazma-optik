<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

class CheckSalesDetailExistence
{
    /**
     * Check if sales detail exists
     * @param int $sales_master_id
     * @param int $branch_item_id
     * @param int $po_detail_id
     * @return int $id
     */
    public function checkSalesDetail(int $sales_master_id, int $branch_item_id, int $po_detail_id) {
        try {
            $sales_detail = SalesDetail::where('sales_master_id', $sales_master_id)
                ->where('branch_item_id', $branch_item_id)
                ->where('po_detail_id', $po_detail_id)
                ->first();

            if ($sales_detail) {
                return $sales_detail->id;
            }
            return 0;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>

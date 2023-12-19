<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

class GetSalesDetailRepository
{
    /**
     * Get sales detail
     * @param int $id
     * @return SalesDetail
     */
    public function getSalesDetail(int $id) {
        try {
            $sales_detail = SalesDetail::where('sales_details.id', $id)
                ->first();

            return $sales_detail;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>

<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

class DeleteSalesDetailRepository {
    /**
     * Delete Sales Detail
     * @param int $id
     * @return SalesDetail
     */
    public function deleteSalesDetail(int $id) {
        try {
            $salesDetail = SalesDetail::find($id);

            $salesDetail->delete();

            return $salesDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

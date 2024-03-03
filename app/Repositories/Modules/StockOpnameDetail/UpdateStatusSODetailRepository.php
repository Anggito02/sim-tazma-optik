<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\Models\Modules\StockOpnameDetail;

class UpdateStatusSODetailRepository {
    /**
     * Adjust Stock Opname Detail
     * @param int $so_detail_id
     * @param bool $is_open
     * @return StockOpnameDetail
     */
    public function updateSODetailAdjustmentStatus(int $so_detail_id, bool $is_open) {
        try {
            $stockOpnameDetail = StockOpnameDetail::find($so_detail_id);

            $stockOpnameDetail->adjustment_status = $is_open ? 'OPEN' : 'CLOSED';
            $stockOpnameDetail->save();

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

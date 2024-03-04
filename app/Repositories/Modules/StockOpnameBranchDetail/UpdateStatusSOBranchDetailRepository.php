<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use App\Models\Modules\StockOpnameBranchDetail;
use Exception;


class UpdateStatusSOBranchDetailRepository {
    /**
     * Adjust Stock Opname Detail
     * @param int $so_detail_id
     * @param string $is_open
     * @return StockOpnameBranchDetail
     */
    public function updateSODetailAdjustmentStatus(int $so_detail_id, bool $is_open) {
        try {
            $stockOpnameDetail = StockOpnameBranchDetail::find($so_detail_id);

            $stockOpnameDetail->adjustment_status = $is_open ? 'OPEN' : 'CLOSED';
            $stockOpnameDetail->save();

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

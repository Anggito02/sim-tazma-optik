<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\Models\Modules\StockOpnameDetail;

class UpdateStatusSOBranchDetailRepository {
    /**
     * Adjust Stock Opname Detail
     * @param int $so_detail_id
     * @param string $is_open
     * @return StockOpnameDetail
     */
    public function updateSODetailAdjustment(int $so_detail_id, bool $is_open) {
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

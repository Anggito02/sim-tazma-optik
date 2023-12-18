<?php

namespace App\Repositories\Modules\BranchItem\BranchStockIn;

use Exception;
use Illuminate\Support\Facades\DB;

class UpdateBranchStockInProcedureRepository {
    /**
     * Call update branch stock in procedure
     * @param string $kode_item
     * @param int $bulan
     * @param $tahun
     * @param int $last_stok_in_qty_branch

     * @param int $item_id
     * @param int $branch_id
     * @param int $branch_item_id
     */
    public function updateBranchStockInProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $last_stok_in_qty_branch,

        int $item_id,
        int $branch_id,
        int $branch_item_id
    ) {
        try {
            $sqlStatement = "CALL update_branch_stock_in_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $last_stok_in_qty_branch,

                $item_id,
                $branch_id,
                $branch_item_id
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

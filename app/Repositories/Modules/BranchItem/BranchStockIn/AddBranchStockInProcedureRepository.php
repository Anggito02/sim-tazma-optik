<?php

namespace App\Repositories\Modules\BranchItem\BranchStockIn;

use Exception;
use Illuminate\Support\Facades\DB;

class AddBranchStockInProcedureRepository {
    /**
     * Call add branch stock in procedure
     * @param string $kode_item
     * @param int $bulan
     * @param $tahun
     * @param int $last_stok_in_qty_branch
     *
     * @param int $item_id
     */

    public function addBranchStockInProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $last_stok_in_qty_branch,

        int $item_id,
    ) {
        try {
            $sqlStatement = "CALL add_branch_stock_in_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $last_stok_in_qty_branch,

                $item_id
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

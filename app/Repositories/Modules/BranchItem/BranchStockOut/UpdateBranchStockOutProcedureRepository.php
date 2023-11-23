<?php

namespace App\Repositories\Modules\BranchItem\BranchStockOut;

use Exception;
use Illuminate\Support\Facades\DB;

class UpdateBranchStockOutProcedureRepository {
    /**
     * Call update branch stock out procedure
     * @param string $kode_item
     * @param int $bulan
     * @param $tahun
     * @param int $last_stok_out_qty_branch

     * @param int $item_id
     */
    public function updateBranchStockOutProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $last_stok_out_qty_branch,

        int $item_id,
    ) {
        try {
            $sqlStatement = "CALL update_branch_stock_out_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $last_stok_out_qty_branch,

                $item_id
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

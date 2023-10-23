<?php

namespace App\Repositories\Modules\Item\StockOut;

use Exception;
use Illuminate\Support\Facades\DB;

class UpdateStockOutProcedureRepository {
    /**
     * Call update stock in procedure
     * @param string $kode_item
     * @param int $bulan
     * @param int $tahun
     * @param int $last_stok_out_qty
     *
     * @param int $item_id
     *
     */
    public function updateStockOutProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $last_stok_out_qty,

        int $item_id,
        ) {
        try {
            $sqlStatement = "CALL update_stock_out_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $last_stok_out_qty,

                $item_id
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

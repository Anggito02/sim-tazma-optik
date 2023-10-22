<?php

namespace App\Repositories\Modules\Item\StockIn;

use Exception;
use Illuminate\Support\Facades\DB;

class AddStockInProcedureRepository {
    /**
     * Call add stock in procedure
     * @param string $kode_item
     * @param int $bulan
     * @param int $tahun
     * @param int $last_stok_in_qty
     *
     * @param int $item_id
     *
     */
    public function addStockInProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $last_stok_in_qty,

        int $item_id,
        ) {
        try {
            $sqlStatement = "CALL add_stock_in_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $last_stok_in_qty,

                $item_id,
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

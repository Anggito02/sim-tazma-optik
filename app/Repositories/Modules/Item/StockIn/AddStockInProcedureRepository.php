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
     * @param int $stok_in_total
     *
     * @param int $item_id
     * @param int $purchase_order_id
     * @param int $receive_order_id
     *
     */
    public function addStockInProcedure(
        string $kode_item,
        int $bulan,
        int $tahun,
        int $stok_in_total,

        int $item_id,
        int $purchase_order_id,
        int $receive_order_id,
        ) {
        try {
            $sqlStatement = "CALL add_stock_in_procedure(
                '$kode_item',
                $bulan,
                $tahun,
                $stok_in_total,

                $item_id,
                $purchase_order_id,
                $receive_order_id
            )";
            DB::statement($sqlStatement);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

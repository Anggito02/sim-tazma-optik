<?php

namespace App\Repositories\Modules\Item;

use Exception;
use Illuminate\Support\Facades\DB;

class StockLogProcedureRepository {
    /**
     * Get stock log procedure
     * @param int $item_id
     * @return array
     */
    public function stockLogProcedure(
        string $tanggal_berubah,
        int $stok_lama,
        int $stok_baru,
        string $bentuk_perubahan,
        int $item_id
        ) {
        try {
            $sqlStatement = "CALL item_stock_logging_procedure(
                '$tanggal_berubah',
                $stok_lama,
                $stok_baru,
                '$bentuk_perubahan',
                $item_id
            )";
            DB::statement($sqlStatement);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

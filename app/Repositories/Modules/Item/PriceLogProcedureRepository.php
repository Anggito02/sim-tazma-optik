<?php

namespace App\Repositories\Modules\Item;

use Exception;
use Illuminate\Support\Facades\DB;

class PriceLogProcedureRepository {
    /**
     * Get price log procedure
     * @param int $item_id
     * @return array
     */
    public function priceLogProcedure(
        string $tipe_harga_berubah,
        string $tanggal_berubah,
        int $harga_lama,
        int $harga_baru,
        string $metode_perubahan,
        int $item_id
        ) {
        try {
            $sqlStatement = "CALL item_logging_procedure(
                '$tipe_harga_berubah',
                '$tanggal_berubah',
                $harga_lama,
                $harga_baru,
                '$metode_perubahan',
                $item_id
            )";
            DB::statement($sqlStatement);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

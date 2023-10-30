<?php

namespace App\Repositories\Modules\BranchItem;

use Exception;
use Illuminate\Support\Facades\DB;

class BranchItemStockLogProcedureRepository {
    /**
     * Call stock log procedure
     * @param string $tanggal_berubah
     * @param int $stok_lama
     * @param int $stok_baru
     * @param int $jumlah_stok_berubah
     * @param string $bentuk_perubahan
     * @param bool $is_Adjustment
     * @param int $branch_item_id
     *
     */
    public function branchItemStockLogProcedure(
        string $tanggal_berubah,
        int $stok_lama,
        int $stok_baru,
        int $jumlah_stok_berubah,
        string $bentuk_perubahan,
        bool $is_Adjustment,
        int $branch_item_id
        ) {
        try {
            $is_Adjustment = $is_Adjustment ? 'true' : 'false';

            $sqlStatement = "CALL branch_item_stock_logging_procedure(
                '$tanggal_berubah',
                $stok_lama,
                $stok_baru,
                $jumlah_stok_berubah,
                '$bentuk_perubahan',
                $is_Adjustment,
                $branch_item_id
            )";
            DB::statement($sqlStatement);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

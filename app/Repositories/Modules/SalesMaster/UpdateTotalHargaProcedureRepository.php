<?php

namespace App\Repositories\Modules\SalesMaster;

use Exception;
use Illuminate\Support\Facades\DB;

class UpdateTotalHargaProcedureRepository {
    /**
     * Update Total Harga Procedure
     * @param int $id
     * @param int $jumlah_perubahan
     * @param string $tipe_perubahan
     * @return void
     */
    public function updateTotalHargaProcedure(int $id, int $jumlah_perubahan, string $tipe_perubahan) {
        try {
            $sqlStatement = "
                CALL update_total_harga_sales_master_procedure(
                    $id,
                    $jumlah_perubahan,
                    '$tipe_perubahan'
                );
            ";

            DB::unprepared($sqlStatement);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

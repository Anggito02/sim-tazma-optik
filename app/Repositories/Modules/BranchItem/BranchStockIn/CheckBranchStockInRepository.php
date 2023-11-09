<?php

namespace App\Repositories\Modules\BranchItem\BranchStockIn;

use Exception;
use Illuminate\Support\Facades\DB;

class CheckBranchStockInRepository {
    /**
     * Call check branch stock in procedure
     * @param int $item_id
     * @param int $bulan
     * @param $tahun
     */
    public function checkBranchStockIn(
        int $item_id,
        int $bulan,
        int $tahun,
    ) {
        try {
            $sqlStatement = "
                SELECT * FROM branch_stock_in_logs
                WHERE item_id = $item_id
                    AND bulan = $bulan
                    AND tahun = $tahun
            ";

            $result = DB::select($sqlStatement)? true : false ;

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\BranchItem\BranchStockOut;

use Exception;
use Illuminate\Support\Facades\DB;

class CheckBranchStockOutRepository {
    /**
     * Call check branch stock out procedure
     * @param int $item_id
     * @param int $branch_id
     * @param int $branch_item_id
     * @param int $bulan
     * @param $tahun
     */
    public function checkBranchStockOut(
        int $item_id,
        int $branch_id,
        int $branch_item_id,
        int $bulan,
        int $tahun,
    ) {
        try {
            $sqlStatement = "
                SELECT * FROM branch_stock_out_logs
                WHERE item_id = $item_id
                    AND branch_id = $branch_id
                    AND branch_item_id = $branch_item_id
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

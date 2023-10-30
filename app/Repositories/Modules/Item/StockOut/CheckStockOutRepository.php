<?php

namespace App\Repositories\Modules\Item\StockOut;

use Exception;
use Illuminate\Support\Facades\DB;

class CheckStockOutRepository {
    /**
     * Check stock in existence
     * @param int $item_id
     * @param int $bulan
     * @param int $tahun
     */
    public function checkStockOutExistence(int $item_id, int $bulan, int $tahun) {
        try {
            $sqlStatement = "
                SELECT * FROM stock_out_logs
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

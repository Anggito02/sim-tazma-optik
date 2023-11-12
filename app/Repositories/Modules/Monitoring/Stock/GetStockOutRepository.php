<?php

namespace App\Repositories\Modules\Monitoring\Stock;

use Exception;
use Illuminate\Support\Facades\DB;

use App\DTO\Modules\Monitoring\Stock\StockInfoDTO;

class GetAllStockOutRepository {
    public function __construct()
    {}

    /**
     * Get all stock out
     * @return StockInfoDTO[]
     */
    public function getAllStockOut() {
        try {
            $stockDTOs = DB::select("
                SELECT
                    stock.id,
                    stock.kode_item,
                    stock.bulan,
                    stock.tahun,
                    stock.stok_total,

                    stock.item_id,
                    item.jenis_item
                FROM stock_out_logs stock
                INNER JOIN item ON item.id = stock.item_id
                ORDER BY TO_DATE(CONCAT(stock.bulan, '-', stock.tahun), 'MM-YYYY') ASC
            ");

            $stockDTOs = [];

            foreach ($stockDTOs as $stockDTO) {
                $stockDTOs[] = new StockInfoDTO(
                    $stockDTO->id,
                    $stockDTO->kode_item,
                    $stockDTO->bulan,
                    $stockDTO->tahun,
                    $stockDTO->stok_total,

                    $stockDTO->item_id,
                    $stockDTO->jenis_item,
                );
            }

            return $stockDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

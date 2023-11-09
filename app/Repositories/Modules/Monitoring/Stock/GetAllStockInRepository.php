<?php

namespace App\Repositories\Modules\Monitoring\Stock;

use Exception;
use Illuminate\Support\Facades\DB;

use App\DTO\Modules\Monitoring\Stock\StockInfoDTO;

class GetAllStockInRepository {
    public function __construct()
    {}

    /**
     * Get all stock in
     * @return StockInfoDTO[]
     */
    public function getAllStockIn() {
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
                FROM stock
                INNER JOIN item ON item.id = stock.item_id
                ORDER BY TO_DATE(CONCAT(stock.bulan, '-', stock.tahun), 'MM-YYYY') ASC
            ");

            $stockDTOs = array_map(function($stockDTO) {
                return new StockInfoDTO(
                    $stockDTO->id,
                    $stockDTO->kode_item,
                    $stockDTO->bulan,
                    $stockDTO->tahun,
                    $stockDTO->stok_total,

                    $stockDTO->item_id,
                    $stockDTO->jenis_item,
                );
            }, $stockDTOs);

            return $stockDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

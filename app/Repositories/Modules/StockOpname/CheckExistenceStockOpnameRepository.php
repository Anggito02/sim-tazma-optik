<?php

namespace App\Repositories\Modules\StockOpname;

use Exception;

use App\DTO\Modules\StockOpnameDTOs\NewStockOpnameDTO;
use App\Models\Modules\StockOpnameMaster;

class CheckExistenceStockOpnameRepository {
    /**
     * Get Stock Opname
     * @param NewStockOpnameDTO $newStockOpnameDTO
     * @return StockOpnameMaster
     */
    public function checkStockOpnameExistence(NewStockOpnameDTO $newStockOpnameDTO) {
        try {
            $stockOpname = StockOpnameMaster::where('bulan', $newStockOpnameDTO->getBulan())
                ->where('tahun', $newStockOpnameDTO->getTahun())
                ->first();

            if ($stockOpname) {
                throw new Exception('Stock Opname already exists');
            }

            return $stockOpname;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\StockOpname;

use Exception;

use App\DTO\Modules\StockOpnameDTOs\NewStockOpnameDTO;
use App\Models\Modules\StockOpnameMaster;

class AddStockOpnameRepository {
    /**
     * Add Stock Opname
     * @param NewStockOpnameDTO $newStockOpnameDTO
     * @return StockOpnameMaster
     */
    public function addStockOpname(NewStockOpnameDTO $newStockOpnameDTO) {
        try {
            $stockOpname = new StockOpnameMaster();
            $stockOpname->tanggal_dibuat = $newStockOpnameDTO->getTanggalDibuat();
            $stockOpname->bulan = $newStockOpnameDTO->getBulan();
            $stockOpname->tahun = $newStockOpnameDTO->getTahun();
            $stockOpname->save();

            return $stockOpname;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

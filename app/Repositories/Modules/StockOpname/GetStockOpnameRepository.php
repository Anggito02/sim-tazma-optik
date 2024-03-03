<?php

namespace App\Repositories\Modules\StockOpname;

use Exception;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;
use App\Models\Modules\StockOpnameMaster;

class GetStockOpnameRepository {
    /**
     * Get Stock Opname
     * @param int $stockOpnameId
     * @return StockOpnameInfoDTO
     */
    public function getStockOpname(int $stockOpnameId) {
        try {
            $stockOpname = StockOpnameMaster::where('id', $stockOpnameId)->first();

            $stockOpnameInfoDTO = new StockOpnameInfoDTO(
                $stockOpname->id,
                $stockOpname->tanggal_dibuat,
                $stockOpname->bulan,
                $stockOpname->tahun,
            );

            return $stockOpnameInfoDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

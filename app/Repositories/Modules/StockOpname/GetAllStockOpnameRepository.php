<?php

namespace App\Repositories\Modules\StockOpname;

use Exception;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;
use App\Models\Modules\StockOpnameMaster;

class GetAllStockOpnameRepository {
    /**
     * Get All Stock Opname
     * @param int $page
     * @param int $limit
     * @return StockOpnameInfoDTO[]
     */
    public function getAllStockOpname(int $page, int $limit) {
        try {
            $stockOpnames = StockOpnameMaster::orderBy('tanggal_dibuat', 'desc')
                ->offset(($page - 1) * $limit)
                ->limit($limit)
                ->get();

            $stockOpnameInfoDTOs = [];

            foreach ($stockOpnames as $stockOpname) {
                $stockOpnameInfoDTO = new StockOpnameInfoDTO(
                    $stockOpname->id,
                    $stockOpname->tanggal_dibuat,
                    $stockOpname->bulan,
                    $stockOpname->tahun,
                );

                array_push($stockOpnameInfoDTOs, $stockOpnameInfoDTO);
            }

            return $stockOpnameInfoDTOs;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

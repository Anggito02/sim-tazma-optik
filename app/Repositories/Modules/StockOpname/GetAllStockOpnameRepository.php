<?php

namespace App\Repositories\Modules\StockOpname;

use Exception;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;
use App\DTO\Modules\StockOpnameDTOs\StockOpnameFilterDTO;
use App\Models\Modules\StockOpnameMaster;

class GetAllStockOpnameRepository {
    /**
     * Get All Stock Opname
     * @param StockOpnameFilterDTO $stockOpnameDTO
     * @return StockOpnameInfoDTO[]
     */
    public function getAllStockOpname(StockOpnameFilterDTO $stockOpnameDTO) {
        try {
            $activeFilter = [];

            $bulanFilter = $stockOpnameDTO->getBulan() ? 'bulan=' . $stockOpnameDTO->getBulan() : null;
            array_push($activeFilter, $bulanFilter);

            $tahunFilter = $stockOpnameDTO->getTahun() ? 'tahun=' . $stockOpnameDTO->getTahun() : null;
            array_push($activeFilter, $tahunFilter);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter !== null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            $stockOpnames = StockOpnameMaster::whereRaw($activeFilter ? $activeFilter : 1)
                ->orderBy('tanggal_dibuat', 'DESC')
                ->paginate($stockOpnameDTO->getLimit(), ['*'], 'page', $stockOpnameDTO->getPage());

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

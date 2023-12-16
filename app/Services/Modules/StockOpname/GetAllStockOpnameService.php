<?php

namespace App\Services\Modules\StockOpname;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;
use App\DTO\Modules\StockOpnameDTOs\StockOpnameFilterDTO;

use App\Repositories\Modules\StockOpname\GetAllStockOpnameRepository;

class GetAllStockOpnameService {
    public function __construct(
        private GetAllStockOpnameRepository $getAllStockOpnameRepository
    ) {}

    /**
     * Get all Stock Opname
     * @param Request $request
     * @return StockOpnameInfoDTO
     */
    public function getAllStockOpname(Request $request) {
        try {
            // Validate request
            $request->validate([
                'bulan' => 'between:1,12',
                'tahun' => 'digits:4',
                'page' => 'required',
                'limit' => 'required',
            ]);

            $SOFilter = new StockOpnameFilterDTO(
                $request->page,
                $request->limit,
                $request->bulan,
                $request->tahun
            );

            $stockOpnameInfoDTO = $this->getAllStockOpnameRepository->getAllStockOpname($SOFilter);

            $stockOpnameArrays = [];

            foreach ($stockOpnameInfoDTO as $stockOpname) {
                array_push($stockOpnameArrays, $stockOpname->toArray());
            }

            return $stockOpnameInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

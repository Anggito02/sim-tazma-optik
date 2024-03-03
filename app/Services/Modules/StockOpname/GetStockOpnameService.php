<?php

namespace App\Services\Modules\StockOpname;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;

use App\Repositories\Modules\StockOpname\GetStockOpnameRepository;

class GetStockOpnameService {
    public function __construct(
        private GetStockOpnameRepository $getStockOpnameRepository
    ) {}

    /**
     * Get Stock Opname
     * @param Request $request
     * @return StockOpnameInfoDTO
     */
    public function getStockOpname(Request $request) {
        try {
            // Validate request
            $request->validate([
                'stock_opname_id' => 'required|exists:stock_opname_masters,id',
            ]);

            $stockOpnameInfoDTO = $this->getStockOpnameRepository->getStockOpname($request->stock_opname_id);

            $stockOpnameArray = $stockOpnameInfoDTO->toArray();

            return $stockOpnameArray;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\StockOpname;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDTOs\StockOpnameInfoDTO;

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
                'page' => 'required',
                'limit' => 'required',
            ]);

            $stockOpnameInfoDTO = $this->getAllStockOpnameRepository->getAllStockOpname($request->page, $request->limit);

            return $stockOpnameInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\Monitoring\Stock;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\Monitoring\Stock\StockInfoDTO;

use App\Repositories\Modules\Monitoring\Stock\GetAllStockInRepository;

class GetAllStockInService {
    public function __construct(
        private GetAllStockInRepository $stockRepository
    )
    {}

    /**
     * Get all stock in
     * @param Request $request
     * @return StockInfoDTO[]
     */
    public function getAllStockIn(Request $request) {
        try {
            // Validate request
            $request->validate([
                'item_id' => 'required|exists:items,id',
            ]);

            $stockDTOs = $this->stockRepository->getAllStockIn();

            return $stockDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

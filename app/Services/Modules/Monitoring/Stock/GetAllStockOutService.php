<?php

namespace App\Services\Modules\Monitoring\Stock;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\Monitoring\Stock\StockOutfoDTO;

use App\Repositories\Modules\Monitoring\Stock\GetAllStockOutRepository;

class GetAllStockOutService {
    public function __construct(
        private GetAllStockOutRepository $stockRepository
    )
    {}

    /**
     * Get all stock out
     * @param Request $request
     * @return StockOutfoDTO[]
     */
    public function getAllStockOut(Request $request) {
        try {
            // Validate request
            $request->validate([
                'item_id' => 'required|exists:items,id',
            ]);

            $stockDTOs = $this->stockRepository->getAllStockOut();

            return $stockDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

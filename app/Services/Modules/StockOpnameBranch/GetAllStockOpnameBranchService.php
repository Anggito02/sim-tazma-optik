<?php

namespace App\Services\Modules\StockOpnameBranch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;

use App\Repositories\Modules\StockOpnameBranch\GetAllStockOpnameBranchRepository;

class GetAllStockOpnameBranchService {
    public function __construct(
        private GetAllStockOpnameBranchRepository $getAllStockOpnameBranchRepository
    ) {}

    /**
     * Get all Stock Opname Branch
     * @param Request $request
     * @return StockOpnameBranchInfoDTO
     */
    public function getAllStockOpnameBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $stockOpnameBranchInfoDTO = $this->getAllStockOpnameBranchRepository->getAllStockOpnameBranch($request->page, $request->limit);

            return $stockOpnameBranchInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

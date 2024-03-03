<?php

namespace App\Services\Modules\StockOpnameBranch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;

use App\Repositories\Modules\StockOpnameBranch\GetStockOpnameBranchRepository;

class GetStockOpnameBranchService {
    public function __construct(
        private GetStockOpnameBranchRepository $getStockOpnameBranchRepository
    ) {}

    /**
     * Get Stock Opname Branch
     * @param Request $request
     * @return StockOpnameBranchInfoDTO
     */
    public function getStockOpnameBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'stock_opname_branch_id' => 'required|exists:stock_opname_masters,id',
            ]);

            $stockOpnameBranchInfoDTO = $this->getStockOpnameBranchRepository->getStockOpnameBranch($request->stock_opname_id);

            $stockOpnameBranchArray = $stockOpnameBranchInfoDTO->toArray();

            return $stockOpnameBranchArray;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\StockOpnameBranchDetailInfoDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\GetStockOpnameBranchDetailRepository;

class GetStockOpnameBranchDetailService {
    public function __construct(
        private GetStockOpnameBranchDetailRepository $getStockOpnameBranchDetailRepository
    ) {}

    /**
     * Get all Stock OpnameBranch Detail
     * @param Request $request
     * @return StockOpnameBranchDetailInfoDTO
     */
    public function getStockOpnameBranchDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'stock_opname_branch_detail_id' => 'required|exists:stock_opname_branch_details,id',
            ]);

            $stockOpnameBranchDetailInfoDTO = $this->getStockOpnameBranchDetailRepository->getStockOpnameBranchDetail($request->stock_opname_branch_detail_id);

            $stockOpnameBranchDetailInfo = $stockOpnameBranchDetailInfoDTO->toArray();

            return $stockOpnameBranchDetailInfo;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

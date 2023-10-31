<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustStockOpnameBranchDetailDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\AdjustStockOpnameBranchDetailRepository;

class AdjustStockOpnameBranchDetailService {
    public function __construct(
        private AdjustStockOpnameBranchDetailRepository $adjustStockOpnameBranchDetailRepository,
    )
    {}

    /**
     * Adjust Stock Opname Branch Detail
     * @param Request $request
     * @return AdjustStockOpnameBranchDetailRepository
     */
    public function adjustStockOpnameBranchDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:stock_opname_branch_details,id',
                'adjustment_date' => 'required|date_format:Y-m-d H:i:s',
                'adjustment_followup_note' => 'required|string',
                'adjustment_by' => 'required|exists:users,id',
            ]);

            $adjustStockOpnameBranchDetailDTO = new AdjustStockOpnameBranchDetailDTO(
                $request->id,
                $request->adjustment_date,
                $request->adjustment_followup_note,
                $request->adjustment_by,
            );

            $stockOpnameBranchDetail = $this->adjustStockOpnameBranchDetailRepository->updateSOBranchDetailAdjustment($adjustStockOpnameBranchDetailDTO);

            return $stockOpnameBranchDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

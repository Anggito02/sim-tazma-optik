<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustInfoSOBranchDetailDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\AdjustStockOpnameBranchDetailRepository;

use App\Services\Modules\StockOpnameBranchDetail\AdjustInSOBranchDetailService;
use App\Services\Modules\StockOpnameBranchDetail\AdjustOutSOBranchDetailService;

use App\Repositories\Modules\StockOpnameBranchDetail\UpdateStatusSOBranchDetailRepository;

class MakeAdjustmentSOBranchDetailService {
    public function __construct(
        private AdjustStockOpnameBranchDetailRepository $adjustStockOpnameBranchDetailRepository,

        private AdjustInSOBranchDetailService $adjustInSOBranchDetailService,
        private AdjustOutSOBranchDetailService $adjustOutSOBranchDetailService,

        private UpdateStatusSOBranchDetailRepository $updateStatusSOBranchDetailRepository
    )
    {}

    /**
     * Make Adjustment Stock Opname Branch Detail
     * @param Request $request
     * @return AdjustStockOpnameBranchDetailRepository
     */
    public function makeAdjustmentSOBranchDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'adjustment_type' => 'required|in:IN,OUT',
                'adjustment_by' => 'required|exists:users,id',

                'items_id' => 'required|exists:items,id',
                'branch_id' => 'required|exists:branches,id',
                'in_out_qty' => 'required|gte:0',
            ]);

            $adjustStockOpnameBranchDetailDTO = new AdjustInfoSOBranchDetailDTO(
                date('Y-m-d H:i:s'),
                $request->adjustment_type,
                $request->adjustment_by,

                $request->items_id,
                $request->branch_id,
                $request->in_out_qty,
            );

            $adjustmentResult = NULL;
            if ($request->adjustment_type == 'IN') {
                $adjustmentResult = $this->adjustInSOBranchDetailService->makeAdjustmentSOBranchDetail($adjustStockOpnameBranchDetailDTO);
            } else {
                $adjustmentResult = $this->adjustOutSOBranchDetailService->makeAdjustmentSOBranchDetail($adjustStockOpnameBranchDetailDTO);
            }

            $this->updateStatusSOBranchDetailRepository->updateSODetailAdjustmentStatus($adjustmentResult, false);

            return $adjustmentResult;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}


?>

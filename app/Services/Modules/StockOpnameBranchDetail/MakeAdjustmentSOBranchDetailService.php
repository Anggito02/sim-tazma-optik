<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustInfoSOBranchDetailDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\AdjustStockOpnameBranchDetailRepository;

use App\Services\Modules\StockOpnameBranchDetail\AdjustInSOBranchDetailService;

class MakeAdjustmentSOBranchDetailService {
    public function __construct(
        private AdjustStockOpnameBranchDetailRepository $adjustStockOpnameBranchDetailRepository,

        private AdjustInSOBranchDetailService $adjustInSOBranchDetailService,
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
                /**
                 * TODO: Adjust Out SO Branch Detail
                 * Waiting for Sales Module
                 */
            }

            return $adjustmentResult;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}


?>

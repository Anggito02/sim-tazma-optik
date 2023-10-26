<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustInfoSODetailDTO;

use App\Services\Modules\StockOpnameDetail\AdjustInSODetailService;
use App\Services\Modules\StockOpnameDetail\AdjustOutSODetailService;

class MakeAdjustmentSODetailService {
    public function __construct(
        private AdjustInSODetailService $adjustInSODetailService,
        private AdjustOutSODetailService $adjustOutSODetailService,
    )
    {}

    /**
     * Make Adjustment Stock Opname Detail
     * @param Request $request
     * @return AdjustStockOpnameDetailRepository
     */
    public function makeAdjustmentSODetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'adjustment_type' => 'required|in:IN,OUT',
                'adjustment_by' => 'required|exists:users,id',

                'item_id' => 'required|exists:items,id',
                'in_out_qty' => 'required|gte:0',
            ]);

            $adjustInfoDTO = new AdjustInfoSODetailDTO(
                $request->adjustment_type,
                $request->adjustment_by,

                $request->item_id,
                $request->in_out_qty,
            );

            $adjustmentResult = NULL;
            if ($request->adjustment_type == 'IN') {
                $adjustmentResult = $this->adjustInSODetailService->makeAdjustmentSODetail($adjustInfoDTO);
            } else {
                $adjustmentResult = $this->adjustOutSODetailService->makeAdjustmentSODetail($adjustInfoDTO);
            }

            return $adjustmentResult;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

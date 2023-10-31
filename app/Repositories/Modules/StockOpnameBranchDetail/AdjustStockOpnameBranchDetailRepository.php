<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustStockOpnameBranchDetailDTO;
use App\Models\Modules\StockOpnameBranchDetail;

class AdjustStockOpnameBranchDetailRepository {
    /**
     * Adjust Stock Opname Branch Detail
     * @param AdjustStockOpnameBranchDetailDTO $adjustStockOpnameBranchDetailDTO
     * @return StockOpnameBranchDetail
     */
    public function updateSOBranchDetailAdjustment(AdjustStockOpnameBranchDetailDTO $adjustStockOpnameBranchDetailDTO) {
        try {
            $stockOpnameBranchDetail = StockOpnameBranchDetail::find($adjustStockOpnameBranchDetailDTO->getId());

            $stockOpnameBranchDetail->adjustment_date = $adjustStockOpnameBranchDetailDTO->getAdjustmentDate();
            $stockOpnameBranchDetail->adjustment_followup_note = $adjustStockOpnameBranchDetailDTO->getAdjustmentFollowupNote();
            $stockOpnameBranchDetail->adjustment_by = $adjustStockOpnameBranchDetailDTO->getAdjustmentBy();
            $stockOpnameBranchDetail->save();

            return $stockOpnameBranchDetail;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

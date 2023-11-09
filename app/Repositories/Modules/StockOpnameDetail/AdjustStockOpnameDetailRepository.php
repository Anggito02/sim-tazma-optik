<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustStockOpnameDetailDTO;
use App\Models\Modules\StockOpnameDetail;

class AdjustStockOpnameDetailRepository {
    /**
     * Adjust Stock Opname Detail
     * @param AdjustStockOpnameDetailDTO $adjustStockOpnameDetailDTO
     * @return StockOpnameDetail
     */
    public function updateSODetailAdjustment(AdjustStockOpnameDetailDTO $adjustStockOpnameDetailDTO) {
        try {
            $stockOpnameDetail = StockOpnameDetail::find($adjustStockOpnameDetailDTO->getId());

            $stockOpnameDetail->adjustment_date = $adjustStockOpnameDetailDTO->getAdjustmentDate();
            $stockOpnameDetail->adjustment_followup_note = $adjustStockOpnameDetailDTO->getAdjustmentFollowupNote();
            $stockOpnameDetail->adjustment_by = $adjustStockOpnameDetailDTO->getAdjustmentBy();
            $stockOpnameDetail->save();

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\DTO\Modules\StockOpnameDetailDTOs\NewStockOpnameDetailDTO;
use App\Models\Modules\StockOpnameDetail;

class AddStockOpnameDetailRepository {
    /**
     * Add Stock Opname Detail
     * @param NewStockOpnameDetailDTO $newStockOpnameDetailDTO
     * @return StockOpnameDetail
     */
    public function addStockOpnameDetail(NewStockOpnameDetailDTO $newStockOpnameDetailDTO) {
        try {
            $stockOpnameDetail = new StockOpnameDetail();
            $stockOpnameDetail->so_start = $newStockOpnameDetailDTO->getSoStart();
            $stockOpnameDetail->so_end = $newStockOpnameDetailDTO->getSoEnd();
            $stockOpnameDetail->actual_qty = $newStockOpnameDetailDTO->getActualQty();
            $stockOpnameDetail->system_qty = $newStockOpnameDetailDTO->getSystemQty();
            $stockOpnameDetail->diff_qty = $newStockOpnameDetailDTO->getDiffQty();
            $stockOpnameDetail->positive_diff_qty = $newStockOpnameDetailDTO->getPositiveDiffQty();
            $stockOpnameDetail->negative_diff_qty = $newStockOpnameDetailDTO->getNegativeDiffQty();
            $stockOpnameDetail->adjustment_type = $newStockOpnameDetailDTO->getAdjustmentType();
            $stockOpnameDetail->item_id = $newStockOpnameDetailDTO->getItemId();
            $stockOpnameDetail->open_by = $newStockOpnameDetailDTO->getOpenBy();
            $stockOpnameDetail->close_by = $newStockOpnameDetailDTO->getCloseBy();
            $stockOpnameDetail->stock_opname_id = $newStockOpnameDetailDTO->getStockOpnameId();
            $stockOpnameDetail->save();

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

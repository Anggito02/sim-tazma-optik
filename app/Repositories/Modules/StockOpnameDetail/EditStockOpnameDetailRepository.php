<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\DTO\Modules\StockOpnameDetailDTOs\EditStockOpnameDetailDTO;
use App\Models\Modules\StockOpnameDetail;

class EditStockOpnameDetailRepository {
    /**
     * Edit Stock Opname Detail
     * @param EditStockOpnameDetailDTO $editStockOpnameDetailDTO
     * @param StockOpnameDetail $stockOpnameDetail
     * @return StockOpnameDetail
     */
    public function editStockOpnameDetail(EditStockOpnameDetailDTO $editStockOpnameDetailDTO) {
        try {
            $stockOpnameDetail = StockOpnameDetail::find($editStockOpnameDetailDTO->getId());

            $stockOpnameDetail->so_start = $editStockOpnameDetailDTO->getSoStart();
            $stockOpnameDetail->so_end = $editStockOpnameDetailDTO->getSoEnd();
            $stockOpnameDetail->actual_qty = $editStockOpnameDetailDTO->getActualQty();
            $stockOpnameDetail->system_qty = $editStockOpnameDetailDTO->getSystemQty();
            $stockOpnameDetail->diff_qty = $editStockOpnameDetailDTO->getDiffQty();
            $stockOpnameDetail->positive_diff_qty = $editStockOpnameDetailDTO->getPositiveDiffQty();
            $stockOpnameDetail->negative_diff_qty = $editStockOpnameDetailDTO->getNegativeDiffQty();
            $stockOpnameDetail->adjustment_type = $editStockOpnameDetailDTO->getAdjustmentType();
            $stockOpnameDetail->item_id = $editStockOpnameDetailDTO->getItemId();
            $stockOpnameDetail->open_by = $editStockOpnameDetailDTO->getOpenBy();
            $stockOpnameDetail->close_by = $editStockOpnameDetailDTO->getCloseBy();
            $stockOpnameDetail->save();


            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

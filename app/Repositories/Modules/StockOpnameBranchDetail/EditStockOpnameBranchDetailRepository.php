<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\EditStockOpnameBranchDetailDTO;
use App\Models\Modules\StockOpnameBranchDetail;

class EditStockOpnameBranchDetailRepository {
    /**
     * Edit Stock Opname Branch Detail
     * @param EditStockOpnameBranchDetailDTO $editStockOpnameBranchDetailDTO
     * @return StockOpnameBranchDetail
     */
    public function editStockOpnameBranchDetail(EditStockOpnameBranchDetailDTO $editStockOpnameBranchDetailDTO) {
        try {
            $stockOpnameBranchDetail = StockOpnameBranchDetail::find($editStockOpnameBranchDetailDTO->getId());
            $stockOpnameBranchDetail->so_start = $editStockOpnameBranchDetailDTO->getSoStart();
            $stockOpnameBranchDetail->so_end = $editStockOpnameBranchDetailDTO->getSoEnd();
            $stockOpnameBranchDetail->actual_qty = $editStockOpnameBranchDetailDTO->getActualQty();
            $stockOpnameBranchDetail->system_qty = $editStockOpnameBranchDetailDTO->getSystemQty();
            $stockOpnameBranchDetail->diff_qty = $editStockOpnameBranchDetailDTO->getDiffQty();
            $stockOpnameBranchDetail->positive_diff_qty = $editStockOpnameBranchDetailDTO->getPositiveDiffQty();
            $stockOpnameBranchDetail->negative_diff_qty = $editStockOpnameBranchDetailDTO->getNegativeDiffQty();
            $stockOpnameBranchDetail->adjustment_type = $editStockOpnameBranchDetailDTO->getAdjustmentType();
            $stockOpnameBranchDetail->item_id = $editStockOpnameBranchDetailDTO->getItemId();
            $stockOpnameBranchDetail->branch_id = $editStockOpnameBranchDetailDTO->getBranchId();
            $stockOpnameBranchDetail->open_by = $editStockOpnameBranchDetailDTO->getOpenBy();
            $stockOpnameBranchDetail->close_by = $editStockOpnameBranchDetailDTO->getCloseBy();
            $stockOpnameBranchDetail->save();

            return $stockOpnameBranchDetail;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\NewStockOpnameBranchDetailDTO;
use App\Models\Modules\StockOpnameBranchDetail;

class AddStockOpnameBranchDetailRepository {
    /**
     * Add Stock Opname Branch Detail
     * @param NewStockOpnameBranchDetailDTO $newStockOpnameBranchDetailDTO
     * @return StockOpnameBranchDetail
     */
    public function addStockOpnameBranchDetail(NewStockOpnameBranchDetailDTO $newStockOpnameBranchDetailDTO) {
        try {
            $stockOpnameBranchDetail = new StockOpnameBranchDetail();
            $stockOpnameBranchDetail->so_start = $newStockOpnameBranchDetailDTO->getSoStart();
            $stockOpnameBranchDetail->so_end = $newStockOpnameBranchDetailDTO->getSoEnd();
            $stockOpnameBranchDetail->actual_qty = $newStockOpnameBranchDetailDTO->getActualQty();
            $stockOpnameBranchDetail->system_qty = $newStockOpnameBranchDetailDTO->getSystemQty();
            $stockOpnameBranchDetail->diff_qty = $newStockOpnameBranchDetailDTO->getDiffQty();
            $stockOpnameBranchDetail->positive_diff_qty = $newStockOpnameBranchDetailDTO->getPositiveDiffQty();
            $stockOpnameBranchDetail->negative_diff_qty = $newStockOpnameBranchDetailDTO->getNegativeDiffQty();
            $stockOpnameBranchDetail->adjustment_type = $newStockOpnameBranchDetailDTO->getAdjustmentType();
            $stockOpnameBranchDetail->item_id = $newStockOpnameBranchDetailDTO->getItemId();
            $stockOpnameBranchDetail->branch_id = $newStockOpnameBranchDetailDTO->getBranchId();
            $stockOpnameBranchDetail->open_by = $newStockOpnameBranchDetailDTO->getOpenBy();
            $stockOpnameBranchDetail->close_by = $newStockOpnameBranchDetailDTO->getCloseBy();
            $stockOpnameBranchDetail->stock_opname_id = $newStockOpnameBranchDetailDTO->getStockOpnameId();
            $stockOpnameBranchDetail->save();

            return $stockOpnameBranchDetail;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

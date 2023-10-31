<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\AdjustInfoSOBranchDetailDTO;
use App\DTO\Modules\BranchItemDTOs\UpdateStokBranchDTO;

use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\BranchItem\UpdateBranchStokRepository;

use App\Repositories\Modules\BranchItem\BranchItemStockLogProcedureRepository;

class AdjustInSOBranchDetailService {
    public function __construct(
        private GetBranchItemRepository $getBranchItemRepository,
        private UpdateBranchStokRepository $updateBranchStokRepository,

        private BranchItemStockLogProcedureRepository $branchItemStockLogProcedureRepository,
    )
    {}

    /**
     * Make Adjust In Stock Opname Branch Detail
     * @param AdjustInfoSOBranchDetailDTO
     */
    public function makeAdjustmentSOBranchDetail(AdjustInfoSOBranchDetailDTO $adjustInfoSOBranchDetailDTO) {
        try {
            $adjustment_date = $adjustInfoSOBranchDetailDTO->getAdjustmentDate();
            $item_id = $adjustInfoSOBranchDetailDTO->getItemId();
            $branch_id = $adjustInfoSOBranchDetailDTO->getBranchId();
            $in_out_qty = $adjustInfoSOBranchDetailDTO->getInOutQty();

            // Get Branch Item
            $branchItem = $this->getBranchItemRepository->getBranchItem($branch_id, $item_id);

            $updatedBranchItem = new UpdateStokBranchDTO(
                $branch_id,
                $item_id,
                $in_out_qty,
            );

            // Update Branch Stok
            $this->updateBranchStokRepository->updateBranchStok($updatedBranchItem);

            // Make Stock Log
            $this->branchItemStockLogProcedureRepository->branchItemStockLogProcedure(
                $adjustment_date,
                $branchItem->getStokBranch(),
                $branchItem->getStokBranch() + $in_out_qty,
                $in_out_qty,
                'penambahan',
                true,
                $branchItem->getId(),
            );

            return;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

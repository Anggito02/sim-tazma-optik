<?php

namespace App\Repositories\Modules\BranchItem;

use Exception;

use App\DTO\Modules\BranchItemDTOs\UpdateStokBranchDTO;
use App\Models\Modules\BranchItem;

class UpdateBranchStokRepository {
    /**
     * Update branch stok
     * @param UpdateStokBranchDTO $updateStokBranchDTO
     * @return BranchItem
     */
    public function updateBranchStok(UpdateStokBranchDTO $updateStokBranchDTO) {
        try {
            $branchItem = BranchItem::where('item_id', $updateStokBranchDTO->getItemId())
                ->where('branch_id', $updateStokBranchDTO->getBranchId());

            $branchItem->update([
                'stok_branch' => $branchItem->first()->stok_branch + $updateStokBranchDTO->getStokBerubah()
            ]);

            return $branchItem;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\BranchItem;

use Exception;

use App\DTO\Modules\BranchItemDTOs\NewBranchItemDTO;
use App\Models\Modules\BranchItem;

class AddBranchItemRepository {
    /**
     * Add new branch item
     * @param NewBranchItemDTO $newBranchItemDTO
     * @return BranchItem
     */
    public function addBranchItem(NewBranchItemDTO $newBranchItemDTO) {
        try {
            $branchItem = BranchItem::create([
                'item_id' => $newBranchItemDTO->getItemId(),
                'branch_id' => $newBranchItemDTO->getBranchId(),
            ]);

            return $branchItem;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

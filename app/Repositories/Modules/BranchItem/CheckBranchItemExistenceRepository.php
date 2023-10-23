<?php

namespace App\Repositories\Modules\BranchItem;

use App\Models\Modules\BranchItem;

class CheckBranchItemExistenceRepository {
    /**
     * Check branch item existence
     * @param int $branchId
     * @param int $itemId
     * @return bool
     */
    public function checkBranchItemExistence(int $branchId, int $itemId) {
        return BranchItem::where('branch_id', $branchId)
            ->where('item_id', $itemId)
            ->exists();
    }
}

?>

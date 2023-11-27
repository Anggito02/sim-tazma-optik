<?php

namespace App\Repositories\Modules\BranchItem;

use Exception;

use App\DTO\Modules\BranchItemDTOs\BranchItemInfoDTO;
use App\Models\Modules\BranchItem;

class GetBranchItemRepository {
    /**
     * Get branch item
     * @param int branch_id
     * @param int item_id
     * @return BranchItemInfoDTO
     */
    public function getBranchItem(int $branch_id, int $item_id): BranchItemInfoDTO {
        try {
            $branchItem = BranchItem::join('items', 'branch_items.item_id', '=', 'items.id')
            ->join('branches', 'branch_items.branch_id', '=', 'branches.id')
            ->where('branch_items.branch_id', $branch_id)
            ->where('branch_items.item_id', $item_id)
            ->select(
                'branch_items.id as id',

                'branch_items.item_id as item_id',
                'items.jenis_item as jenis_item',
                'items.kode_item as kode_item',
                'items.stok as stok_global',

                'branch_items.branch_id as branch_id',
                'branches.kode_branch as kode_branch',
                'branches.nama_branch as nama_branch',

                'branch_items.stok_branch as stok_branch',
            )->first();

            $branchItemInfoDTO = new BranchItemInfoDTO(
                $branchItem->id,

                $branchItem->item_id,
                $branchItem->jenis_item,
                $branchItem->kode_item,
                $branchItem->stok_global,

                $branchItem->branch_id,
                $branchItem->kode_branch,
                $branchItem->nama_branch,

                $branchItem->stok_branch,
            );

            return $branchItemInfoDTO;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

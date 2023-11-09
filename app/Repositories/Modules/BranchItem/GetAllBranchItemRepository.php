<?php

namespace App\Repositories\Modules\BranchItem;

use Exception;

use App\DTO\Modules\BranchItemDTOs\BranchItemInfoDTO;
use App\Models\Modules\BranchItem;

class GetAllBranchItemRepository {
    /**
     * Get all branch item
     * @param int $page
     * @param int $limit
     * @return array BranchItemInfoDTO
     */
    public function getAllBranchItem(int $page, int $limit) {
        try {
            // use pagination
            $branchItems = BranchItem::join('items', 'branch_items.item_id', '=', 'items.id')
                ->join('branches', 'branch_items.branch_id', '=', 'branches.id')->select('branch_items.*', 'items.jenis_item as jenis_item', 'items.kode_item as kode_item', 'items.stok as stok_global', 'branches.kode_branch as kode_branch', 'branches.nama_branch as nama_branch')->paginate($limit, ['*'], 'page', $page);

            $branchItemInfoDTOs = [];

            foreach ($branchItems as $branchItem) {
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

                array_push($branchItemInfoDTOs, $branchItemInfoDTO);
            }

            return $branchItemInfoDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

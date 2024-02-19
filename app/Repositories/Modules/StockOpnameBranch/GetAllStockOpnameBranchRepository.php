<?php

namespace App\Repositories\Modules\StockOpnameBranch;

use Exception;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;
use App\Models\Modules\StockOpnameBranch;

class GetAllStockOpnameBranchRepository {
    /**
     * Get all Stock Opname Branch
     * @param int $page
     * @param int $limit
     * @return StockOpnameInfoBranchDTO
     */
    public function getAllStockOpnameBranch(int $page, int $limit) {
        try {
            $stockOpnameBranches = StockOpnameBranch::orderBy('tanggal_dibuat', 'desc')
                ->offset(($page - 1) * $limit)
                ->limit($limit)
                ->get();

            $stockOpnameBranchInfoDTOs = [];

            foreach ($stockOpnameBranches as $stockOpnameBranch) {
                $stockOpnameBranchInfoDTO = new StockOpnameBranchInfoDTO(
                    $stockOpnameBranch->id,
                    $stockOpnameBranch->tanggal_dibuat,
                    $stockOpnameBranch->bulan,
                    $stockOpnameBranch->tahun,
                    $stockOpnameBranch->branch_id
                );

                array_push($stockOpnameBranchInfoDTOs, $stockOpnameBranchInfoDTO);
            }

            return $stockOpnameBranchInfoDTOs;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\StockOpnameBranch;

use Exception;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;
use App\Models\Modules\StockOpnameBranch;

class GetStockOpnameBranchRepository {
    /**
     * Get Stock OpnameBranch
     * @param int $stockOpnameBranchId
     * @return StockOpnameBranchInfoDTO
     */
    public function getStockOpnameBranch(int $stockOpnameBranchId) {
        try {
            $stockOpnameBranch = StockOpnameBranch::join('branches', 'branches.id', '=', 'stock_opname_branches.branch_id')
                ->where('stock_opname_branches.id', $stockOpnameBranchId)
                ->select('stock_opname_branches.*', 'branches.nama_branch')
                ->first();

            $stockOpnameBranchInfoDTO = new StockOpnameBranchInfoDTO(
                $stockOpnameBranch->id,
                $stockOpnameBranch->tanggal_dibuat,
                $stockOpnameBranch->bulan,
                $stockOpnameBranch->tahun,

                $stockOpnameBranch->branch_id,
                $stockOpnameBranch->nama_branch
            );

            return $stockOpnameBranchInfoDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

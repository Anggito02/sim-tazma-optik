<?php

namespace App\Repositories\Modules\StockOpnameBranch;

use Exception;

use App\DTO\Modules\StockOpnameBranchDTOs\NewStockOpnameBranchDTO;
use App\Models\Modules\StockOpnameBranch;

class CheckExistenceStockOpnameBranchRepository {
    /**
     * Get Stock Opname
     * @param NewStockOpnameBranchDTO $newStockOpnameBranchDTO
     * @return StockOpnameBranchMaster
     */
    public function checkStockOpnameBranchExistence(NewStockOpnameBranchDTO $newStockOpnameBranchDTO) {
        $stockOpname = StockOpnameBranch::where('bulan', $newStockOpnameBranchDTO->getBulan())
            ->where('tahun', $newStockOpnameBranchDTO->getTahun())
            ->where('branch_id', $newStockOpnameBranchDTO->getBranchId())
            ->first();

        if ($stockOpname) {
            throw new Exception('Stock Opname already exists');
        }

        return $stockOpname;
    }
}

?>

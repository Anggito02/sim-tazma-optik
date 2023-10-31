<?php

namespace App\Repositories\Modules\StockOpnameBranch;

use Exception;

use App\DTO\Modules\StockOpnameBranchDTOs\NewStockOpnameBranchDTO;
use App\Models\Modules\StockOpnameBranch;

class AddStockOpnameBranchRepository {
    /**
     * Add Stock Opname Branch
     * @param NewStockOpnameBranchDTO $newStockOpnameBranchDTO
     * @return StockOpnameBranch
     */
    public function addStockOpnameBranch(NewStockOpnameBranchDTO $newStockOpnameBranchDTO) {
        try {
            $stockOpnameBranch = new StockOpnameBranch();
            $stockOpnameBranch->tanggal_dibuat = $newStockOpnameBranchDTO->getTanggalDibuat();
            $stockOpnameBranch->bulan = $newStockOpnameBranchDTO->getBulan();
            $stockOpnameBranch->tahun = $newStockOpnameBranchDTO->getTahun();
            $stockOpnameBranch->branch_id = $newStockOpnameBranchDTO->getBranchId();
            $stockOpnameBranch->save();

            return $stockOpnameBranch;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

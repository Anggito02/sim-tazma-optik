<?php

namespace App\Repositories\Modules\StockOpnameBranch;

use Exception;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;
use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchFilterDTO;
use App\Models\Modules\StockOpnameBranch;

class GetAllStockOpnameBranchRepository {
    /**
     * Get all Stock Opname Branch
     * @param StockOpnameBranchFilterDTO $stockOpnameDTO
     * @return StockOpnameInfoBranchDTO
     */
    public function getAllStockOpnameBranch(StockOpnameBranchFilterDTO $stockOpnameDTO) {
        try {
            $activeFilter = [];

            $bulanFilter = $stockOpnameDTO->getBulan() ? 'bulan=' . $stockOpnameDTO->getBulan() : null;
            array_push($activeFilter, $bulanFilter);

            $tahunFilter = $stockOpnameDTO->getTahun() ? 'tahun=' . $stockOpnameDTO->getTahun() : null;
            array_push($activeFilter, $tahunFilter);

            $branchFilter = $stockOpnameDTO->getBranchId() ? 'branch_id=' . $stockOpnameDTO->getBranchId() : null;
            array_push($activeFilter, $branchFilter);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter != null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            $stockOpnameBranches = StockOpnameBranch::whereRaw($activeFilter ? $activeFilter : 1)
                ->join('branches', 'branches.id', '=', 'stock_opname_branches.branch_id')
                ->select(
                    'stock_opname_branches.*',
                    'branches.nama_branch as nama_branch'
                )
                ->orderBy('tabggal_dibuat', 'DESC')
                ->paginate($stockOpnameDTO->getLimit(), ['*'], 'page', $stockOpnameDTO->getPage());

            $stockOpnameBranchInfoDTOs = [];

            foreach ($stockOpnameBranches as $stockOpnameBranch) {
                $stockOpnameBranchInfoDTO = new StockOpnameBranchInfoDTO(
                    $stockOpnameBranch->id,
                    $stockOpnameBranch->tanggal_dibuat,
                    $stockOpnameBranch->bulan,
                    $stockOpnameBranch->tahun,
                    $stockOpnameBranch->branch_id,
                    $stockOpnameBranch->nama_branch
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

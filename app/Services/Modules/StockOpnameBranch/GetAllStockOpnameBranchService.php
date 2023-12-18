<?php

namespace App\Services\Modules\StockOpnameBranch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchInfoDTO;
use App\DTO\Modules\StockOpnameBranchDTOs\StockOpnameBranchFilterDTO;

use App\Repositories\Modules\StockOpnameBranch\GetAllStockOpnameBranchRepository;

class GetAllStockOpnameBranchService {
    public function __construct(
        private GetAllStockOpnameBranchRepository $getAllStockOpnameBranchRepository
    ) {}

    /**
     * Get all Stock Opname Branch
     * @param Request $request
     * @return StockOpnameBranchInfoDTO
     */
    public function getAllStockOpnameBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'bulan' => 'between:1,12',
                'tahun' => 'digits:4',
                'branch_id' => 'exists:branches,id',
                'page' => 'required',
                'limit' => 'required',
            ]);

            $stockOpnameDTO = new StockOpnameBranchFilterDTO(
                $request->page,
                $request->limit,
                $request->bulan,
                $request->tahun,
                $request->branch_id,
            );

            $stockOpnameBranchInfoDTO = $this->getAllStockOpnameBranchRepository->getAllStockOpnameBranch($stockOpnameDTO);

            $stockOpnameBranchArrays = [];

            foreach ($stockOpnameBranchInfoDTO as $stockOpnameBranchInfo) {
                array_push($stockOpnameBranchArrays, $stockOpnameBranchInfo->toArray());
            }

            return $stockOpnameBranchArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

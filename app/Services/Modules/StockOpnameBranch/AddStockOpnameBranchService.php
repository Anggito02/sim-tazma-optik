<?php

namespace App\Services\Modules\StockOpnameBranch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDTOs\NewStockOpnameBranchDTO;

use App\Repositories\Modules\StockOpnameBranch\CheckExistenceStockOpnameBranchRepository;
use App\Repositories\Modules\StockOpnameBranch\AddStockOpnameBranchRepository;

class AddStockOpnameBranchService {
    public function __construct(
        private CheckExistenceStockOpnameBranchRepository $checkExistenceStockOpnameBranchRepository,
        private AddStockOpnameBranchRepository $addStockOpnameBranchRepository,
    )
    {}

    /**
     * Add Stock Opname Branch
     * @param Request $request
     * @return NewStockOpnameBranchDTO
     */
    public function addStockOpnameBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'branch_id' => 'required|exists:branches,id',
            ]);

            $newStockOpnameBranchDTO = new NewStockOpnameBranchDTO(
                date('Y-m-d H:i:s'),
                date('m'),
                date('Y'),
                $request->branch_id,
            );

            // if stock opname already exists
            if ($this->checkExistenceStockOpnameBranchRepository->checkStockOpnameBranchExistence($newStockOpnameBranchDTO)) {
                throw new Exception('Stock Opname already exists');
            }

            $this->addStockOpnameBranchRepository->addStockOpnameBranch($newStockOpnameBranchDTO);

            return $newStockOpnameBranchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

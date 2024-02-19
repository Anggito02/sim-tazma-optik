<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\GetAllBranchRepository;

class GetAllBranchService {
    public function __construct(
        private GetAllBranchRepository $branchRepository
    ) {}

    /**
     * Get all branch
     * @return BranchDTO
     */
    public function getAllBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $branchDTO = $this->branchRepository->getAllBranch($request->page, $request->limit);

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

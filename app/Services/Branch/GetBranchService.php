<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\GetBranchRepository;

class GetBranchService {
    public function __construct(
        private GetBranchRepository $branchRepository
    ) {}

    /**
     * Get branch
     * @param Request $request
     * @return BranchDTO
     */
    public function getBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branches,id',
            ]);

            $id = $request->id;

            $branchDTO = $this->branchRepository->getBranch($id);

            return $branchDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\DeleteBranchRepository;

class DeleteBranchService {
    public function __construct(
        private DeleteBranchRepository $branchRepository
    ) {}

    /**
     * Delete branch
     * @param Request $request
     * @return BranchDTO
     */
    public function deleteBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branches,id',
            ]);

            $id = $request->id;

            $branchDTO = $this->branchRepository->deleteBranch($id);

            return $branchDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

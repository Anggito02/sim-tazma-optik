<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\BranchDTO;
use App\Models\Branch;

class DeleteBranchRepository {
    /**
     * Delete branch
     * @param BranchDTO $branchDTO
     * @return BranchDTO
     */
    public function deleteBranch(int $id) {
        try {
            $branch = Branch::find($id);
            $branch->delete();

            return $branch;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

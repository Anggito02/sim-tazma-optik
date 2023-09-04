<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\BranchDTO;
use App\Models\Branch;

class GetBranchRepository {
    /**
     * Get branch
     * @param BranchDTO $branchDTO
     * @return BranchDTO
     */
    public function getBranch(int $id) {
        try {
            $branch = Branch::find($id);

            $branchDTO = new BranchDTO(
                $branch->id,
                $branch->name,
                $branch->address,
                $branch->phone,
                $branch->email,
                $branch->created_at,
                $branch->updated_at
            );

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

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
                $branch->kode_branch,
                $branch->nama_branch,
                $branch->alamat,
                $branch->employee_id_pic_branch,
            );

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

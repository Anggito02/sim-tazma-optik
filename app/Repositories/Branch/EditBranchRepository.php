<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\BranchDTO;
use App\Models\Branch;

class EditBranchRepository {
    /**
     * Edit branch
     * @param BranchDTO $branchDTO
     * @return BranchDTO
     */
    public function editBranch(BranchDTO $branchDTO) {
        try {
            $branch = Branch::find($branchDTO->id);
            $branch->kode_branch = $branchDTO->kode_branch;
            $branch->nama_branch = $branchDTO->nama_branch;
            $branch->alamat = $branchDTO->alamat;
            $branch->employee_id_pic_branch = $branchDTO->employee_id_pic_branch;
            $branch->save();

            return $branch;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

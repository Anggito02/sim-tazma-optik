<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\BranchDTO;
use App\Models\Branch;

class AddBranchRepository {
    /**
     * Add branch
     * @param BranchDTO $branchDTO
     * @return BranchDTO
     */
    public function addBranch(BranchDTO $branchDTO) {
        try {
            $newBranch = new Branch();
            $newBranch->kode_branch = $branchDTO->getKodeBranch();
            $newBranch->nama_branch = $branchDTO->getNamaBranch();
            $newBranch->alamat = $branchDTO->getAlamat();
            $newBranch->employee_id_pic_branch = $branchDTO->getEmployeeIdPicBranch();
            $newBranch->save();

            return $newBranch;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

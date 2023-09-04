<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\DTO\BranchDTO;

use App\Models\Branch;

class GetAllBranchByEmployeeIdRepository {
    /**
     * Get all branch by employee id
     * @param int $id
     * @return BranchDTO
     */
    public function getAllBranchByEmployeeId(int $id, int $page, int $limit) {
        try {
            $branches = Branch::where('employee_id_pic_branch', $id)->paginate($limit, ['*'], 'page', $page);

            $branchDTOs = [];
            foreach ($branches as $branch) {
                $branchDTO = new BranchDTO(
                    $branch->id,
                    $branch->kode_branch,
                    $branch->nama_branch,
                    $branch->alamat,
                    $branch->employee_id_pic_branch,
                );

                array_push($branchDTOs, $branchDTO);
            }

            return $branchDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

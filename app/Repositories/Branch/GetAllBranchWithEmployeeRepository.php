<?php

namespace App\Repositories\Branch;

use Exception;

use App\Models\Branch;

class GetAllBranchWithEmployeeRepository {
    /**
     * Get all branch with employee
     * @param int $page
     * @param int $limit
     * @return array BranchDTO,employee_name
     */
    public function getAllBranchWithEmployee(int $page, int $limit) {
        try {
            // inner join branch and employee
            $branches = Branch::join('users', 'branches.employee_id_pic_branch', '=', 'users.id')
                ->select('branches.*', 'users.employee_name')
                ->paginate($limit, ['*'], 'page', $page);

            $branchDTOs = [];

            foreach ($branches as $branch) {
                $branchDTO = [
                    'id' => $branch->id,
                    'kode_branch' => $branch->kode_branch,
                    'nama_branch' => $branch->nama_branch,
                    'alamat' => $branch->alamat,
                    'employee_id_pic_branch' => $branch->employee_id_pic_branch,
                    'employee_name' => $branch->employee_name,
                ];

                array_push($branchDTOs, $branchDTO);
            }

            return $branchDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}
?>

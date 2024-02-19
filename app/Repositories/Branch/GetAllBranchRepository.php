<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\BranchDTO;
use App\Models\Branch;

class GetAllBranchRepository {
    /**
     * Get all branch
     * @param int $page
     * @param int $limit
     * @return BranchDTO
     */
    public function getAllBranch(int $page, int $limit) {
        try {
            // use pagination
            $branches = Branch::skip(1)->paginate($limit, ['*'], 'page', $page);

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

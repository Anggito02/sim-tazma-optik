<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\AddBranchRepository;

class AddBranchService {
    public function __construct(
        private AddBranchRepository $branchRepository
    ) {}

    /**
     * Add branch
     * @param Request $request
     * @return BranchDTO
     */
    public function addBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'kode_branch' => 'required|unique:branches, kode_branch',
                'nama_branch' => 'required',
                'alamat' => 'required',
                'employee_id_pic_branch' => 'required|exists:employees, id',
            ]);

            $branchDTO = new BranchDTO(
                null,
                $request->kode_branch,
                $request->nama_branch,
                $request->alamat,
                $request->employee_id_pic_branch,
            );

            $branchDTO = $this->branchRepository->addBranch($branchDTO);

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

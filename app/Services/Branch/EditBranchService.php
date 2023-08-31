<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\EditBranchRepository;

class EditBranchService {
    public function __construct(
        private EditBranchRepository $branchRepository
    ) {}

    /**
     * Edit branch
     * @param Request $request
     * @return BranchDTO
     */
    public function editBranch(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'kode_branch' => 'required',
                'nama_branch' => 'required',
                'alamat' => 'required',
                'employee_id_pic_branch' => 'required',
            ]);

            $branchDTO = new BranchDTO(
                $request->id,
                $request->kode_branch,
                $request->nama_branch,
                $request->alamat,
                $request->employee_id_pic_branch,
            );

            $branchDTO = $this->branchRepository->editBranch($branchDTO);

            return $branchDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

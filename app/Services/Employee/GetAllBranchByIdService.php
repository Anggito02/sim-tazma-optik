<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use App\DTO\BranchDTO;

use App\Repositories\Employee\GetAllBranchByUserIdRepository;

class GetAllBranchByIdService {
    public function __construct(
        private GetAllBranchByUserIdRepository $employeeRepository
    ) {}

    /**
     * Get all branch by employee id
     * @return UserDTO
     */
    public function getAllBranchById(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'page' => 'required',
                'limit' => 'required',
            ]);

            $branchDTO = $this->employeeRepository->getAllBranchById($request->id, $request->page, $request->limit);

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>

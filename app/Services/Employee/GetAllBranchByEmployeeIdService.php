<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use App\DTO\BranchDTO;

use App\Repositories\Employee\GetAllBranchByUserIdRepository;

class GetAllBranchByEmployeeIdService {
    public function __construct(
        private GetAllBranchByUserIdRepository $employeeRepository
    ) {}

    /**
     * Get all branch by employee id
     * @return UserDTO
     */
    public function getAllBranchByEmployeeId(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $branchDTO = $this->employeeRepository->getAllBranchByEmployeeId($request->id, $request->page, $request->limit);

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>

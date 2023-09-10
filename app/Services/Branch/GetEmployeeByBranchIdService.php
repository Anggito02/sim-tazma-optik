<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;
use App\DTO\BranchDTO;

use App\Repositories\Branch\GetEmployeeByBranchIdRepository;

class GetEmployeeByBranchIdService {
    public function __construct(
        private GetEmployeeByBranchIdRepository $branchRepository
    ) {}

    /**
     * Get employee by branch id
     * @param Request $request
     * @return UserDTO
     */
    public function getEmployeeByBranchId(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branches,id'
            ]);

            $userDTO = $this->branchRepository->getEmployeeByBranchId($request->id);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}
?>

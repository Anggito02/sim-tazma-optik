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
     * @return EmployeeDTO
     */
    public function getEmployeeByBranchId(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:branches,id'
            ]);

            $employeeDTO = $this->branchRepository->getEmployeeByBranchId($request->id);

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}
?>

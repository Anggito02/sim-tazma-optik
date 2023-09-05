<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;
use App\DTO\BranchDTO;

use App\Repositories\Employee\GetAllBranchByEmployeeIdRepository;

class GetAllBranchByEmployeeIdService {
    public function __construct(
        private GetAllBranchByEmployeeIdRepository $employeeRepository
    ) {}

    /**
     * Get all branch by employee id
     * @return EmployeeDTO
     */
    public function getAllBranchByEmployeeId(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:employees,id',
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

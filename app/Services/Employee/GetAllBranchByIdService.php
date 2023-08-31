<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;
use App\DTO\BranchDTO;

use App\Repositories\Employee\GetAllBranchByIdRepository;

class GetAllBranchByIdService {
    public function __construct(
        private GetAllBranchByIdRepository $employeeRepository
    ) {}

    /**
     * Get all branch by employee id
     * @return EmployeeDTO
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

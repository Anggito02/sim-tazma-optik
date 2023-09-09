<?php

namespace App\Services\Branch;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BranchDTO;

use App\Repositories\Branch\GetAllBranchWithEmployeeRepository;

class GetAllBranchWithEmployeeService {
    public function __construct(
        private GetAllBranchWithEmployeeRepository $branchRepository
    ) {}

    /**
     * Get all branch with employee name
     * @param Request $request
     * @return array BranchDTO, employee_name
     */
    public function getAllBranchWithEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $branchDTO = $this->branchRepository->getAllBranchWithEmployee($request->page, $request->limit);

            return $branchDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

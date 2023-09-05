<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;

use App\Repositories\Employee\GetAllEmployeeRepository;

class GetAllEmployeeService {
    public function __construct(
        private GetAllEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get all employees
     * @param Request $request
     * @return EmployeeDTO
     */
    public function getAllEmployees(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $employeeDTO = $this->employeeRepository->getAllEmployees($request->page, $request->limit);

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

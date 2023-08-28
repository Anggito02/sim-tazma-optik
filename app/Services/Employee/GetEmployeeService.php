<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;

use App\Repositories\Employee\GetEmployeeRepository;

class GetEmployeeService {
    public function __construct(
        private GetEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get employee by id
     * @param Request $request
     * @return EmployeeDTO
     */
    public function getEmployee(Request $request) {
        try {
            $employeeDTO = $this->employeeRepository->getEmployee($request->id);

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

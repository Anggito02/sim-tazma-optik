<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;

use App\Repositories\Employee\DeleteEmployeeRepository;

class DeleteEmployeeService {
    public function __construct(
        private DeleteEmployeeRepository $employeeRepository
    ) {}

    /**
     * Delete employee
     * @param Request $request
     * @return EmployeeDTO
     */
    public function deleteEmployee(Request $request) {
        try {
            $employeeDTO = $this->employeeRepository->deleteEmployee($request->id);

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

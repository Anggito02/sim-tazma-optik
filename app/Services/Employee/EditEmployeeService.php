<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;

use App\Repositories\Employee\EditEmployeeRepository;

class EditEmployeeService {
    public function __construct(
        private EditEmployeeRepository $employeeRepository
    ) {}

    /**
     * Edit employee
     * @param Request $request
     * @return EmployeeDTO
     */
    public function editEmployee(Request $request) {
        try {
            $employeeDTO = new EmployeeDTO(
                $request->id,
                $request->username,
                $request->nik,
                $request->employee_name,
                $request->department,
                $request->section,
                $request->position,
                $request->role,
                $request->plant,
                $request->status,
            );

            $employeeResult = $this->employeeRepository->editEmployee($employeeDTO);

            return $employeeResult;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

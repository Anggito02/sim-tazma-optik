<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\EmployeeDTO;

use App\Repositories\Employee\AddEmployeeRepository;

class AddEmployeeService {
    public function __construct(
        private AddEmployeeRepository $employeeRepository
    ) {}

    /**
     * Add employee
     * @param Request $request
     * @return EmployeeDTO
     */
    public function addEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'username' => 'required',
                'nik' => 'required',
                'employee_name' => 'required',
                'department' => 'required',
                'section' => 'required',
                'position' => 'required',
                'role' => 'required',
                'plant' => 'required',
                'status' => 'required',
            ]);

            $employeeDTO = new EmployeeDTO(
                null,
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

            $employeeResult = $this->employeeRepository->addEmployee($employeeDTO);

            return $employeeResult;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

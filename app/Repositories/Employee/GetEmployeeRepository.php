<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Employee;

class GetEmployeeRepository {
    /**
     * Get employee by id
     * @param int $id
     * @return EmployeeDTO
     */
    public function getEmployee(int $id) {
        try {
            $employee = Employee::find($id);

            $employeeDTO = new EmployeeDTO(
                $employee->id,
                $employee->username,
                $employee->nik,
                $employee->employee_name,
                $employee->department,
                $employee->section,
                $employee->position,
                $employee->role,
                $employee->plant,
                $employee->status,
            );

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

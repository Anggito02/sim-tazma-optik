<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Employee;

class EditEmployeeRepository {
    /**
     * Edit employee
     * @param EmployeeDTO $employeeDTO
     * @return EmployeeDTO
     */
    public function editEmployee(EmployeeDTO $employeeDTO) {
        try {
            $employee = Employee::find($employeeDTO->id);

            $employee->username = $employeeDTO->username;
            $employee->nik = $employeeDTO->nik;
            $employee->employee_name = $employeeDTO->employee_name;
            $employee->department = $employeeDTO->department;
            $employee->section = $employeeDTO->section;
            $employee->position = $employeeDTO->position;
            $employee->role = $employeeDTO->role;
            $employee->plant = $employeeDTO->plant;
            $employee->status = $employeeDTO->status;
            $employee->save();

            return $employeeDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

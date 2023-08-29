<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Employee;

class AddEmployeeRepository {
    /**
     * Add employee
     * @param EmployeeDTO $employeeDTO
     * @return EmployeeDTO
     */
    public function addEmployee(EmployeeDTO $employeeDTO) {
        try {
            $newEmployee = new Employee();
            $newEmployee->username = $employeeDTO->username;
            $newEmployee->nik = $employeeDTO->nik;
            $newEmployee->employee_name = $employeeDTO->employee_name;
            $newEmployee->department = $employeeDTO->department;
            $newEmployee->section = $employeeDTO->section;
            $newEmployee->position = $employeeDTO->position;
            $newEmployee->role = $employeeDTO->role;
            $newEmployee->plant = $employeeDTO->plant;
            $newEmployee->status = $employeeDTO->status;
            $newEmployee->save();

            return $newEmployee;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

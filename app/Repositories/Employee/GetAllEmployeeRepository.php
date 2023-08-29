<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Employee;

class GetAllEmployeeRepository {
    /**
     * Get all employees
     * @return array of employeeDTOs
     */
    public function getAllEmployees(int $page, int $limit) {
        try {
            $employees = Employee::paginate($limit, ['*'], 'page', $page);

            $employeeDTOs = [];
            foreach ($employees as $employee) {
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

                array_push($employeeDTOs, $employeeDTO);
            }

            return $employeeDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

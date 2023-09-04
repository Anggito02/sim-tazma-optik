<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Branch;
use App\Models\Employee;

class GetEmployeeByBranchIdRepository {
    /**
     * Get employee by branch id
     * @param int $id
     * @return EmployeeDTO
     */
    public function getEmployeeByBranchId(int $id) {
        try {
            $branch = Branch::find($id);

            $employee = Employee::find($branch->employee_id_pic_branch);

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

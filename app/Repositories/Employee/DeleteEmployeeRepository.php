<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\EmployeeDTO;
use App\Models\Employee;

class DeleteEmployeeRepository {
    /**
     * Delete employee
     * @param int $id
     * @return EmployeeDTO
     */
    public function deleteEmployee(int $id) {
        try {
            $employee = Employee::find($id);
            $employee->delete();

            return $employee;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

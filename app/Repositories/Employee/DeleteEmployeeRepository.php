<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class DeleteEmployeeRepository {
    /**
     * Delete employee
     * @param int $id
     * @return UserDTO
     */
    public function deleteEmployee(int $id) {
        try {
            $employee = User::find($id);
            $employee->delete();

            return $employee;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

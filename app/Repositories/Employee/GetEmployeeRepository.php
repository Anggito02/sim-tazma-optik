<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class GetEmployeeRepository {
    /**
     * Get employee by id
     * @param int $id
     * @return UserDTO
     */
    public function getEmployee(int $id) {
        try {
            $employee = User::find($id);

            $userDTO = new UserDTO(
                $employee->id,
                $employee->email,
                null,
                $employee->username,
                $employee->nik,
                $employee->employee_name,
                $employee->photo,
                $employee->gender,
                $employee->address,
                $employee->phone,
                $employee->department,
                $employee->section,
                $employee->position,
                $employee->role,
                $employee->plant,
                $employee->status,
                $employee->group,
                $employee->domicile
            );

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

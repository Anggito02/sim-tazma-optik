<?php

namespace App\Repositories\Branch;

use Exception;

use App\DTO\UserDTO;
use App\Models\Branch;
use App\Models\User;

class GetEmployeeByBranchIdRepository {
    /**
     * Get employee by branch id
     * @param int $id
     * @return UserDTO
     */
    public function getEmployeeByBranchId(int $id) {
        try {
            $branch = Branch::find($id);

            $employee = $branch->user;

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

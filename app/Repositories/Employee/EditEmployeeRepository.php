<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class EditEmployeeRepository {
    /**
     * Edit employee
     * @param UserDTO $userDTO
     * @return UserDTO
     */
    public function editEmployee(UserDTO $userDTO) {
        try {
            $employee = User::find($userDTO->id);

            $employee->email = $userDTO->email;
            $employee->password = $userDTO->password;
            $employee->username = $userDTO->username;
            $employee->nik = $userDTO->nik;
            $employee->employee_name = $userDTO->employee_name;
            $employee->photo = $userDTO->photo;
            $employee->department = $userDTO->department;
            $employee->section = $userDTO->section;
            $employee->position = $userDTO->position;
            $employee->role = $userDTO->role;
            $employee->plant = $userDTO->plant;
            $employee->status = $userDTO->status;
            $employee->group = $userDTO->group;
            $employee->domicile = $userDTO->domicile;
            $employee->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

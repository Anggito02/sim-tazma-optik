<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTOs\EditUserDTO;
use App\Models\User;

class EditEmployeeRepository {
    /**
     * Edit employee
     * @param EditUserDTO $userDTO
     * @return EditUserDTO
     */
    public function editEmployee(EditUserDTO $userDTO) {
        try {
            $employee = User::find($userDTO->getId());

            $employee->email = $userDTO->getEmail();
            $employee->password = $userDTO->getPassword();
            $employee->username = $userDTO->getUsername();
            $employee->nik = $userDTO->getNik();
            $employee->nip = $userDTO->getNip();
            $employee->employee_name = $userDTO->getEmployeeName();
            $employee->photo = $userDTO->getPhoto();
            $employee->gender = $userDTO->getGender();
            $employee->address = $userDTO->getAddress();
            $employee->phone = $userDTO->getPhone();
            $employee->department = $userDTO->getDepartment();
            $employee->section = $userDTO->getSection();
            $employee->position = $userDTO->getPosition();
            $employee->role = $userDTO->getRole();
            $employee->status = $userDTO->getStatus();
            $employee->group = $userDTO->getGroup();
            $employee->domicile = $userDTO->getDomicile();
            $employee->branch_id = $userDTO->getBranchId();
            $employee->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

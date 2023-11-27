<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class GetAllEmployeeRepository {
    /**
     * Get all employees
     * @param int $page
     * @param int $limit
     * @return array of userDTO
     */
    public function getAllEmployees(int $page, int $limit) {
        try {
            $employees = User::paginate($limit, ['*'], 'page', $page);

            $userDTOs = [];
            foreach ($employees as $employee) {
                $userDTO = new UserDTO(
                    $employee->id,
                    $employee->email,
                    null,
                    $employee->username,
                    $employee->nik,
                    $employee->nip,
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

                array_push($userDTOs, $userDTO);
            }

            return $userDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

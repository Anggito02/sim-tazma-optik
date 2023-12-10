<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTOs\UserInfoDTO;
use App\Models\User;

class GetAllEmployeeRepository {
    /**
     * Get all employees
     * @param int $page
     * @param int $limit
     * @return UserInfoDTO[]
     */
    public function getAllEmployees(int $page, int $limit) {
        try {
            $employees = User::join('branches', 'users.branch_id', '=', 'branches.id')
            ->select(
                'users.id',
                'users.email',
                'users.username',
                'users.nik',
                'users.nip',
                'users.employee_name',
                'users.photo',
                'users.gender',
                'users.address',
                'users.phone',
                'users.department',
                'users.section',
                'users.position',
                'users.role',
                'users.status',
                'users.group',
                'users.domicile',
                'users.branch_id',
                'branches.name as nama_branch'
            )->paginate($limit, ['*'], 'page', $page);

            $userDTOs = [];
            foreach ($employees as $employee) {
                $userDTO = new UserInfoDTO(
                    $employee->id,
                    $employee->email,
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
                    $employee->status,
                    $employee->group,
                    $employee->domicile,
                    $employee->branch_id,
                    $employee->nama_branch
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

<?php

namespace App\Repositories\Employee;

use Exception;

use App\DTO\UserDTOs\UserInfoDTO;
use App\Models\User;

class GetEmployeeRepository {
    /**
     * Get employee by id
     * @param int $id
     * @return UserInfoDTO
     */
    public function getEmployee(int $id) {
        try {
            $employee = User::join('branches', 'users.branch_id', '=', 'branches.id')
                ->where('users.id', $id)
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
                )
                ->first();

            if (!$employee) {
                throw new Exception('Employee not found');
            }

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

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Auth;

use Exception;
use App\DTO\UserDTOs\NewUserDTO;
use App\DTO\AuthDTOs\LoginInfoDTO;

use App\Models\User;

class RegisterRepository {
    /**
     * Register new user
     * @param NewUserDTO $userDTO
     * @return LoginInfoDTO
     */
    public function register(NewUserDTO $userDTO) {
        try {
            $user = new User();
            $user->email = $userDTO->getEmail();
            $user->password = $userDTO->getPassword();
            $user->username = $userDTO->getUsername();
            $user->nik = $userDTO->getNik();
            $user->nip = $userDTO->getNip();
            $user->employee_name = $userDTO->getEmployeeName();
            $user->photo = $userDTO->getPhoto();
            $user->gender = $userDTO->getGender();
            $user->address = $userDTO->getAddress();
            $user->phone = $userDTO->getPhone();
            $user->department = $userDTO->getDepartment();
            $user->section = $userDTO->getSection();
            $user->position = $userDTO->getPosition();
            $user->role = $userDTO->getRole();
            $user->status = $userDTO->getStatus();
            $user->group = $userDTO->getGroup();
            $user->domicile = $userDTO->getDomicile();
            $user->branch_id = $userDTO->getBranchId();
            $user->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

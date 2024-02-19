<?php

namespace App\Repositories\Auth;

use Exception;
use App\DTO\UserDTO;

use App\Models\User;

class RegisterRepository {
    /**
     * Register new user
     * @param UserDTO $userDTO
     * @return UserDTO
     */
    public function register(UserDTO $userDTO) {
        try {
            $user = new User();
            $user->email = $userDTO->email;
            $user->password = $userDTO->password;
            $user->username = $userDTO->username;
            $user->nik = $userDTO->nik;
            $user->nip = $userDTO->nip;
            $user->employee_name = $userDTO->employee_name;
            // $user->photo = $userDTO->photo;
            $user->gender = $userDTO->gender;
            $user->address = $userDTO->address;
            $user->phone = $userDTO->phone;
            $user->department = $userDTO->department;
            $user->section = $userDTO->section;
            $user->position = $userDTO->position;
            $user->role = $userDTO->role;
            $user->plant = $userDTO->plant;
            $user->status = $userDTO->status;
            $user->group = $userDTO->group;
            $user->domicile = $userDTO->domicile;
            $user->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

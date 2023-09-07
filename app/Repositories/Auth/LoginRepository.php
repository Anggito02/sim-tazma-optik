<?php

namespace App\Repositories\Auth;

use Exception;
use App\DTO\UserDTO;

use App\Models\User;

class LoginRepository {
    /**
     * Check if user exists
     * @param UserDTO $userDTO
     * @return UserDTO
     */
    public function login(UserDTO $userDTO) {
        try {
            $user = User::where('email', $userDTO->email)->first();

            if (!$user) {
                throw new Exception('Invalid credentials');
            }

            if (!password_verify($userDTO->password, $user->password)) {
                throw new Exception('Invalid credentials');
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return new UserDTO(
                $user->id,
                $user->email,
                null,
                $user->username,
                $user->nik,
                $user->employee_name,
                null,
                $user->gender,
                $user->address,
                $user->phone,
                $user->department,
                $user->section,
                $user->position,
                $user->role,
                $user->plant,
                $user->status,
                $user->group,
                $user->domicile,
                $token
            );
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

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
                $user->password,
                $user->username,
                $user->role,
                $token
            );
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

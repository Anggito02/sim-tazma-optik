<?php

namespace App\Repositories\Auth;

use Exception;

use App\DTO\AuthDTOs\LoginDTO;
use App\DTO\AuthDTOs\LoginInfoDTO;

use App\Models\User;

class LoginRepository {
    /**
     * Check if user exists
     * @param LoginDTO $userDTO
     * @return LoginInfoDTO
     */
    public function login(LoginDTO $userDTO) {
        try {
            $user = User::where('email', $userDTO->getEmail())
            ->join('branches', 'users.branch_id', '=', 'branches.id')
            ->select('users.*', 'branches.branch_name')
            ->first();

            if (!$user) {
                throw new Exception('Invalid credentials');
            }

            if (!password_verify($userDTO->getPassword(), $user->password)) {
                throw new Exception('Invalid credentials');
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return new LoginInfoDTO(
                $user->employee_name,
                $user->email,
                $user->role,
                $token
            );

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

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
            ->leftJoin('branches', 'users.branch_id', '=', 'branches.id')
            ->select('users.*', 'branches.nama_branch')
            ->first();

            if (!$user) {
                throw new Exception('Invalid credentials');
            }

            if (!password_verify($userDTO->getPassword(), $user->password)) {
                throw new Exception('Invalid credentials');
            }

            $token = $user->createToken('auth_token')->plainTextToken;
<<<<<<< HEAD
            // print_r($user);
            return new UserDTO(
                $user->id,
                $user->branch_id,
                $user->email,
                null,
                $user->username,
                $user->nik,
                $user->nip,
=======

            return new LoginInfoDTO(
>>>>>>> 29e2c5a3fdc74d2fae264c9670aeef780aa12f62
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

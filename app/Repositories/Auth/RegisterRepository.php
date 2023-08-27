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
            $user->role = $userDTO->role;

            $user->save();

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

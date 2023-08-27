<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

class LoginServiceProvider {
    public function __construct(

    ) {}

    /**
     * Login new user
     * @param Request $request
     * @return UserDTO
     */
    public function login(Request $request) {
        try {
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                $request->email,
                $hashedPassword,
                $request->username,
                'user'
            );

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

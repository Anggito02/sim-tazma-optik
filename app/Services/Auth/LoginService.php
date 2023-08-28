<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Auth\LoginRepository;

class LoginService {
    public function __construct(
        // Repository
        private LoginRepository $loginRepository
    ) {}

    /**
     * Login new user
     * @param Request $request
     * @return UserDTO
     */
    public function login(Request $request) {
        try {
            // Validate user data
            $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required',
            ]);

            $userDTO = new UserDTO(
                $request->email,
                $request->password,
                null,
                'user'
            );

            // Get user from database
            $validUserDTO = $this->loginRepository->login($userDTO);

            return ([
                'username' => $validUserDTO->getUsername(),
                'email' => $validUserDTO->getEmail(),
                'role' => $validUserDTO->getRole(),
                'token' => $validUserDTO->getToken()
            ]);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

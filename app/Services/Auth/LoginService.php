<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\AuthDTOs\LoginDTO;
use App\DTO\AuthDTOs\LoginInfoDTO;
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
     * @return LoginInfoDTO
     */
    public function login(Request $request) {
        try {
            // Validate user data
            $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required',
            ]);

            $userDTO = new LoginDTO(
                $request->email,
                $request->password,
            );

            // Get user from database
            $validUserDTO = $this->loginRepository->login($userDTO);

            $userInfo = $validUserDTO->toArray();

            dd($userInfo);

            return $userInfo;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

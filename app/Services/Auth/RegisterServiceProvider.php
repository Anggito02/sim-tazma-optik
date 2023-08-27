<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Utils\Auth\UserDataValidator;
use App\Repositories\Auth\RegisterRepository;


class RegisterServiceProvider {
    public function __construct(
        // Validator
        private UserDataValidator $userDataValidator,

        // Repository
        private RegisterRepository $registerRepository
    ) {}

    /**
     * Register new user
     * @param Request $request
     * @return UserDTO
     */
    public function register(Request $request) {
        try {
            $username = $request->username;
            $email = $request->email;
            $password = $request->password;
            $role = 'user';

            $this->userDataValidator->validateUsername($username);
            $this->userDataValidator->validateEmail($email);
            $this->userDataValidator->validatePassword($password);

            // Hash password
            $hashedPassword = Hash::make($password);

            $userDTO = new UserDTO(
                $email,
                $hashedPassword,
                $username,
                $role
            );

            // Add user to database
            $this->registerRepository->register($userDTO);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

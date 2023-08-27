<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Auth\RegisterRepository;


class RegisterServiceProvider {
    public function __construct(
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
            // Validate user data
            $request->validate([
                'username' => 'required|alpha_dash|unique:users|min:4|max:20',
                'email' => 'required|email:dns|unique:users',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
            ]);

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                $request->email,
                $hashedPassword,
                $request->username,
                'user'
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

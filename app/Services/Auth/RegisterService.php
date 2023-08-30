<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Auth\RegisterRepository;


class RegisterService {
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
                'email' => 'required|email:dns|unique:users',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
                'employee_name' => 'required',
                'nik' => 'required|unique:users',
                'photo' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required|unique:users',
                'department' => 'required',
                'section' => 'required',
                'position' => 'required',
                'group' => 'required',
                'domicile' => 'required',
            ]);

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                null,
                $request->email,
                $hashedPassword,
                $request->employee_name,
                $request->nik,
                $request->photo,
                $request->gender,
                $request->address,
                $request->phone,
                $request->department,
                $request->section,
                $request->position,
                'user',
                $request->group,
                $request->domicile,
            );

            // Add user to database
            $userResult = $this->registerRepository->register($userDTO);

            return ([
                'employee_name' => $userResult->getEmployeeName(),
                'email' => $userResult->getEmail(),
                'role' => $userResult->getRole()
            ]);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

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
                'email' => 'required|email:dns|unique:users, email',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
                'username' => 'required|unique:users',
                'nik' => 'required|unique:users',
                'employee_name' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gender' => 'required|in:laki-laki,perempuan',
                'address' => 'required',
                'phone' => 'required|unique:users, phone',
                'department' => 'required',
                'section' => 'required',
                'position' => 'required',
                'role' => 'required',
                'plant' => 'required',
                'status' => 'required',
                'group' => 'required',
                'domicile' => 'required',
            ]);

            // Upload photo
            $imagePath = "";
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoNameLowercased = strtolower($photo->getClientOriginalName());
                $photoNameUnderscored = str_replace(' ', '_', $photoNameLowercased);
                $photoName = time() . '_' . $photoNameUnderscored;

                $photo->move(public_path('images'), $photoName);

                // Get image path
                $imagePath = 'images/' . $photoName;
            }

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                null,
                $request->email,
                $hashedPassword,
                $request->username,
                $request->nik,
                $request->employee_name,
                $imagePath,
                $request->gender,
                $request->address,
                $request->phone,
                $request->department,
                $request->section,
                $request->position,
                'user',
                $request->plant,
                $request->status,
                $request->group,
                $request->domicile,
            );

            // Add user to database
            $userResult = $this->registerRepository->register($userDTO);

            return ([
                'employee_name' => $userResult->getEmployeeName(),
                'email' => $userResult->getEmail(),
                'role' => $userResult->getRole(),
            ]);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

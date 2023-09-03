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
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required|unique:users',
                'department' => 'required',
                'section' => 'required',
                'position' => 'required',
                'group' => 'required',
                'domicile' => 'required',
            ]);

            // Upload photo
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoNameLowercased = strtolower($photo->getClientOriginalName());
                $photoNameUnderscored = str_replace(' ', '_', $photoNameLowercased);
                $photoName = time() . '_' . $photoNameUnderscored.'.'.$photo->getClientOriginalExtension();

                $photo->move(public_path('images'), $photoName);

                // Get image path
                $imagePath = public_path('images') . '/' . $photoName;
            }

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                null,
                $request->email,
                $hashedPassword,
                $request->employee_name,
                $request->nik,
                $imagePath,
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

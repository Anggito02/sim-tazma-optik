<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;

use App\Repositories\Employee\EditEmployeeRepository;
use Illuminate\Support\Facades\Hash;

class EditEmployeeService {
    public function __construct(
        private EditEmployeeRepository $employeeRepository
    ) {}

    /**
     * Edit employee
     * @param Request $request
     * @return UserDTO
     */
    public function editEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
                'email' => 'required|email',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
                'username' => 'required',
                'nik' => 'required',
                'employee_name' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gender' => 'required|in:laki-laki,perempuan',
                'address' => 'required',
                'phone' => 'required',
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
                $photoName = time() . '_' . $photoNameUnderscored.'.'.$photo->getClientOriginalExtension();

                $photo->move(public_path('images'), $photoName);

                // Get image path
                $imagePath = 'images/' . $photoName;
            }

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                $request->id,
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
                $request->role,
                $request->plant,
                $request->status,
                $request->group,
                $request->domicile
            );

            // Edit employee
            $employeeResult = $this->employeeRepository->editEmployee($userDTO);

            return $employeeResult;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTOs\EditUserDTO;

use App\Repositories\Employee\EditEmployeeRepository;
use Illuminate\Support\Facades\Hash;

class EditEmployeeService {
    public function __construct(
        private EditEmployeeRepository $employeeRepository
    ) {}

    /**
     * Edit employee
     * @param Request $request
     * @return User
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
                'nip' => 'required',
                'employee_name' => 'required',
                // 'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gender' => 'required|in:laki-laki,perempuan',
                'address' => 'required',
                'phone' => 'required',
                'department' => 'required',
                'section' => 'required',
                'position' => 'required',
                'role' => 'required',
                'status' => 'required',
                'group' => 'required',
                'domicile' => 'required',
                'branch_id' => 'required|exists:branches,id',
            ]);

            // TODO: Upload photo
            $photo = 'photo.png';

            // Hash password
            $hashedPassword = Hash::make($request->password);

            $userDTO = new EditUserDTO(
                $request->id,
                $request->email,
                $hashedPassword,
                $request->username,
                $request->nik,
                $request->nip,
                $request->employee_name,
                $photo,
                $request->gender,
                $request->address,
                $request->phone,
                $request->department,
                $request->section,
                $request->position,
                $request->role,
                $request->status,
                $request->group,
                $request->domicile,
                $request->branch_id
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

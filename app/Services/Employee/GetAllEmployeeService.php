<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\DTO\UserDTO;

use App\Repositories\Employee\GetAllEmployeeRepository;

class GetAllEmployeeService {
    public function __construct(
        private GetAllEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get all employees
     * @param Request $request
     * @return UserDTO
     */
    public function getAllEmployees(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $userDTOs = $this->employeeRepository->getAllEmployees($request->page, $request->limit);

            // getting user photo
            foreach ($userDTOs as $userDTO) {
                // get user photo
                $imageContent = Storage::disk('public')->get($userDTO->photo);

                // determine content type
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $photoExtension = $finfo->buffer($imageContent);

                // encode image
                $base64Image = base64_encode($imageContent);

                // create image data uri
                $userDTO->photo = "data:$photoExtension;base64,$base64Image";
            }

            return $userDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

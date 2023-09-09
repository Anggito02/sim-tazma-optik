<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\DTO\UserDTO;

use App\Repositories\Employee\GetEmployeeRepository;

class GetEmployeeService {
    public function __construct(
        private GetEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get employee by id
     * @param Request $request
     * @return UserDTO
     */
    public function getEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $userDTO = $this->employeeRepository->getEmployee($request->id);

            // get user photo
            $imageContent = Storage::disk('public')->get($userDTO->photo);

            // determine content type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $photoExtension = $finfo->buffer($imageContent);

            // encode image
            $base64Image = base64_encode($imageContent);

            // create image data uri
            $userDTO->photo = "data:$photoExtension;base64,$base64Image";

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

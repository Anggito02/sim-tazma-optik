<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Employee\GetEmployeeRepository;

class GetEmployeeService {
    public function __construct(
        private GetEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get employee by id
     * @param Request $request
     * @return UserInfo[]
     */
    public function getEmployee(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
            ]);

            $userDTO = $this->employeeRepository->getEmployee($request->id);

            $userArray = $userDTO->toArray();

            // TODO: get user photo

            return $userArray;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

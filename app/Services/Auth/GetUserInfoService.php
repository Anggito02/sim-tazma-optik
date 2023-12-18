<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTOs\UserInfoDTO;

use App\Repositories\Employee\GetEmployeeRepository;

class GetUserInfoService {
    public function __construct(
        private GetEmployeeRepository $getEmployeeRepository
    ) {}

    /**
     * Get user info by id
     * @param Request $request
     * @return UserInfoDTO
     */
    public function getUserInfo(Request $request) {
        try {
            $user_id = $request->user()->id;

            $employee = $this->getEmployeeRepository->getEmployee($user_id);

            $employee = $employee->toArray();

            return $employee;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

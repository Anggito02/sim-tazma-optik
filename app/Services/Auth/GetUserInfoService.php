<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTO;

use App\Repositories\Auth\GetUserInfoRepository;

class GetUserInfoService {
    public function __construct(
    ) {}

    /**
     * Get user info by id
     * @param Request $request
     * @return UserDTO
     */
    public function getUserInfo(Request $request) {
        try {
            $user_id = $request->user()->id;
            $user_email = $request->user()->email;
            $user_photo = $request->user()->photo;
            $user_role = $request->user()->role;
            $user_employee_name = $request->user()->employee_name;

            $userDTO = new UserDTO(
                $user_id,
                $user_email,
                null,
                $user_employee_name,
                null,
                $user_photo,
                null,
                null,
                null,
                null,
                null,
                null,
                $user_role,
                null
            );

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

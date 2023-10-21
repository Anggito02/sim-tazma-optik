<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTO;

use App\Repositories\Auth\GetUserInfoRepository;
use Illuminate\Support\Facades\Storage;

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
            // get user photo path
            $user_photo_path = $request->user()->photo;

            // get user photo
            if ($user_photo_path) {
                $user_photo = Storage::get(public_path('images') . '/' . $user_photo_path);
            } else {
                $user_photo = null;
            }
            $user_role = $request->user()->role;
            $user_employee_name = $request->user()->employee_name;
            $user_username = $request->user()->username;

            $userDTO = new UserDTO(
                $user_id,
                $user_email,
                null,
                $user_username,
                null,
                $user_employee_name,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $user_role,
            );

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

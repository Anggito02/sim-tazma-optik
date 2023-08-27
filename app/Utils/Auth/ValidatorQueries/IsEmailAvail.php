<?php

namespace App\Utils\Auth\ValidatorQueries;

use Exception;

use App\Models\User;

class IsEmailAvail {
    /**
     * Check if email is available
     * @param string $email
     * @return bool
     */
    public function isEmailAvail(string $email) {
        try {
            $user = User::where('email', $email)->first();

            if ($user) {
                return false;
            }

            return true;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

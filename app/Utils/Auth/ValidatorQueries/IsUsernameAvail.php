<?php

namespace App\Utils\Auth\ValidatorQueries;

use Exception;

use App\Models\User;

class IsUsernameAvail {
    /**
     * Check if username is available
     * @param string $username
     * @return bool
     */
    public function isUsernameAvail(string $username) {
        try {
            $user = User::where('username', $username)->first();

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

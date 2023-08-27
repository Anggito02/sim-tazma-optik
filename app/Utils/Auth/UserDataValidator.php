<?php

namespace App\Utils\Auth;

use Exception;

use App\Utils\Auth\ValidatorQueries\IsUsernameAvail;
use App\Utils\Auth\ValidatorQueries\IsEmailAvail;

class UserDataValidator {
    public function __construct(
        // IsAvail
        private IsUsernameAvail $isUsernameAvail,
        private IsEmailAvail $isEmailAvail
    ) {}

    /**
     * Validate Username
     * @return json
     */
    public function validateUsername($username) {
        // Check username availability
        if (!$this->isUsernameAvail->isUsernameAvail($username)) {
            throw new Exception('Username is not available');
        }

        // Check username length (4 - 20 characters)
        if (strlen($username) < 4 || strlen($username) > 20) {
            throw new Exception('Username must be between 4 and 20 characters');
        }

        // Check username characters (only letters, numbers, and underscores)
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            throw new Exception('Username can only contain letters, numbers, and underscores');
        }

        // Return true if username is valid
        return true;
    }

    /**
     * Validate Email
     * @return json
     */
    public function validateEmail($email) {
        // Check email availability
        if (!$this->isEmailAvail->isEmailAvail($email)) {
            throw new Exception('Email is not available');
        }

        // Check if email is valid
        if (!preg_match('/^[^@]+@[^@]+\.[^@]+$/', $email)) {
            throw new Exception('Email is not valid');
        }

        // Return true if email is valid
        return true;
    }

    /**
     * Validate Password
     * @return json
     */
    public function validatePassword($password) {
        // Check password length (8 - 20 characters)
        if (strlen($password) < 8 || strlen($password) > 20) {
            throw new Exception('Password must be between 8 and 20 characters');
        }

        // Check password characters (only letters, numbers, and underscores)
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $password)) {
            throw new Exception('Password can only contain letters, numbers, and underscores');
        }

        // Check if password contains at least 1 letter and 1 number
        if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            throw new Exception('Password must contain at least 1 letter and 1 number');
        }
    }
}

?>

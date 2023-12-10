<?php

namespace App\DTO\AuthDTOs;

class LoginInfoDTO
{
    public function __construct(
        private string $employee_name,
        private string $email,
        private string $role,
        private string $token
    )
    {}

    public function toArray(): array
    {
        return [
            'employee_name' => $this->employee_name,
            'email' => $this->email,
            'role' => $this->role,
            'token' => $this->token
        ];
    }

    public function getEmployeeName(): string
    {
        return $this->employee_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}

?>

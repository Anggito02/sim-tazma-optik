<?php

namespace App\DTO\UserDTOs;

class UserInfoDTO {
    public function __construct(
        private int $id,
        private string $email,
        private string $username,
        private string $nik,
        private string $nip,
        private string $employee_name,
        private string $photo,
        private string $gender,
        private string $address,
        private string $phone,
        private string $department,
        private string $section,
        private string $position,
        private string $role,
        private string $status,
        private string $group,
        private string $domicile,
        private int $branch_id,
        private string $nama_branch
    )
    {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'username' => $this->username,
            'nik' => $this->nik,
            'nip' => $this->nip,
            'employee_name' => $this->employee_name,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone' => $this->phone,
            'department' => $this->department,
            'section' => $this->section,
            'position' => $this->position,
            'role' => $this->role,
            'status' => $this->status,
            'group' => $this->group,
            'domicile' => $this->domicile,
            'branch_id' => $this->branch_id,
            'nama_branch' => $this->nama_branch
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getNik(): string
    {
        return $this->nik;
    }

    public function getNip(): string
    {
        return $this->nip;
    }

    public function getEmployeeName(): string
    {
        return $this->employee_name;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getSection(): string
    {
        return $this->section;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getDomicile(): string
    {
        return $this->domicile;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function getNamaBranch(): string
    {
        return $this->nama_branch;
    }
}

?>

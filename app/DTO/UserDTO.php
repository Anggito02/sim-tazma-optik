<?php

namespace App\DTO;

class UserDTO {
    public function __construct(
        public ?int $id,
        public string $email,
        public ?string $password = null,
        public ?string $employee_name = null,
        public ?string $nik = null,
        public ?string $photo = null,
        public ?string $gender = null,
        public ?string $address = null,
        public ?string $phone = null,
        public ?string $department = null,
        public ?string $section = null,
        public ?string $position = null,
        public ?string $role = 'user',
        public ?string $group = null,
        public ?string $domicile = null,
        public ?string $token = null
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getEmployeeName(): string {
        return $this->employee_name;
    }

    public function setEmployeeName(string $employee_name): void {
        $this->employee_name = $employee_name;
    }

    public function getNik(): string {
        return $this->nik;
    }

    public function setNik(string $nik): void {
        $this->nik = $nik;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender):void {
        $this->gender = $gender;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    public function getDepartment(): string {
        return $this->department;
    }

    public function setDepartment(string $department): void {
        $this->department = $department;
    }

    public function getSection(): string {
        return $this->section;
    }

    public function setSection(string $section): void {
        $this->section = $section;
    }

    public function getPosition(): string {
        return $this->position;
    }

    public function setPosition(string $position): void {
        $this->position = $position;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

    public function getGroup(): string {
        return $this->group;
    }

    public function setGroup(string $group): void {
        $this->group = $group;
    }

    public function getDomicile(): string {
        return $this->domicile;
    }

    public function setDomicile(string $domicile): void {
        $this->domicile = $domicile;
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): void {
        $this->token = $token;
    }
}

?>

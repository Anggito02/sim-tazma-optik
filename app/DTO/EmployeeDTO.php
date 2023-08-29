<?php

namespace App\DTO;

class EmployeeDTO {
    public function __construct(
        public ?int $id,
        public string $username,
        public string $nik,
        public string $employee_name,
        public string $department,
        public string $section,
        public string $position,
        public string $role,
        public string $plant,
        public string $status,
    )
    {}

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getNik(): string {
        return $this->nik;
    }

    public function setNik(string $nik): void {
        $this->nik = $nik;
    }

    public function getEmployeeName(): string {
        return $this->employee_name;
    }

    public function setEmployeeName(string $employee_name): void {
        $this->employee_name = $employee_name;
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

    public function getPlant(): string {
        return $this->plant;
    }

    public function setPlant(string $plant): void {
        $this->plant = $plant;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }
}

?>

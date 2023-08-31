<?php

namespace App\DTO;

class BranchDTO {
    public function __construct(
        public ?int $id,
        public string $kode_branch,
        public string $nama_branch,
        public string $alamat,
        public int $employee_id_pic_branch,
    )
    {}

    public function getKodeBranch(): string {
        return $this->kode_branch;
    }

    public function setKodeBranch(string $kode_branch): void {
        $this->kode_branch = $kode_branch;
    }

    public function getNamaBranch(): string {
        return $this->nama_branch;
    }

    public function setNamaBranch(string $nama_branch): void {
        $this->nama_branch = $nama_branch;
    }

    public function getAlamat(): string {
        return $this->alamat;
    }

    public function setAlamat(string $alamat): void {
        $this->alamat = $alamat;
    }

    public function getEmployeeIdPicBranch(): int {
        return $this->employee_id_pic_branch;
    }

    public function setEmployeeIdPicBranch(int $employee_id_pic_branch): void {
        $this->employee_id_pic_branch = $employee_id_pic_branch;
    }
}

?>

<?php

namespace App\DTO\Customer;

class CustomerInfoDTO {
    public function __construct(
        public int $id,
        public string $nama_depan,
        public string $nama_belakang,
        public string $email,
        public string $nomor_telepon,
        public string $alamat,
        public string $kota,
        public int $usia,
        public string $tanggal_lahir,
        public string $gender,
        public int $branch_id,
        public string $branch_nama,
    )
    {}

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNamaDepan(string $nama_depan): void {
        $this->nama_depan = $nama_depan;
    }

    public function setNamaBelakang(string $nama_belakang): void {
        $this->nama_belakang = $nama_belakang;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setNomorTelepon(string $nomor_telepon): void {
        $this->nomor_telepon = $nomor_telepon;
    }

    public function setAlamat(string $alamat): void {
        $this->alamat = $alamat;
    }

    public function setKota(string $kota): void {
        $this->kota = $kota;
    }

    public function setUsia(int $usia): void {
        $this->usia = $usia;
    }

    public function setTanggalLahir(string $tanggal_lahir): void {
        $this->tanggal_lahir = $tanggal_lahir;
    }

    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setBranchNama(string $branch_nama): void {
        $this->branch_nama = $branch_nama;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNamaDepan(): string {
        return $this->nama_depan;
    }

    public function getNamaBelakang(): string {
        return $this->nama_belakang;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getNomorTelepon(): string {
        return $this->nomor_telepon;
    }

    public function getAlamat(): string {
        return $this->alamat;
    }

    public function getKota(): string {
        return $this->kota;
    }

    public function getUsia(): int {
        return $this->usia;
    }

    public function getTanggalLahir(): string {
        return $this->tanggal_lahir;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getBranchNama(): string {
        return $this->branch_nama;
    }
}

?>

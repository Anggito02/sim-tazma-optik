<?php

namespace App\DTO\Customer;

class CustomerInfoDTO {
    public function __construct(
        private int $id,
        private string $nama_depan,
        private string $nama_belakang,
        private string $email,
        private string $nomor_telepon,
        private string $alamat,
        private int $usia,
        private string $tanggal_lahir,
        private string $gender,
        private int $branch_id,
        private string $branch_nama,
        private int $kabkota_id,
        private string $nama_kabkota
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'email' => $this->email,
            'nomor_telepon' => $this->nomor_telepon,
            'alamat' => $this->alamat,
            'usia' => $this->usia,
            'tanggal_lahir' => $this->tanggal_lahir,
            'gender' => $this->gender,
            'branch_id' => $this->branch_id,
            'branch_nama' => $this->branch_nama,
            'kabkota_id' => $this->kabkota_id,
            'nama_kabkota' => $this->nama_kabkota
        ];
    }

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

    public function setKabkotaId(int $kabkota_id): void {
        $this->kabkota_id = $kabkota_id;
    }

    public function setKabkotaNama(string $nama_kabkota): void {
        $this->nama_kabkota = $nama_kabkota;
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

    public function getKabkotaId(): int {
        return $this->kabkota_id;
    }

    public function getKabkotaNama(): string {
        return $this->nama_kabkota;
    }
}

?>

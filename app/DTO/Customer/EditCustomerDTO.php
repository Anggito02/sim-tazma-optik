<?php

namespace App\DTO\Customer;

class EditCustomerDTO {
    public function __construct(
        private int $id,
        private string $nama_depan,
        private string $nama_belakang,
        private string $email,
        private string $nomor_telepon,
        private string $alamat
    )
    {}

    public function getId():int {
        return $this->id;
    }

    public function getNamaDepan():string {
        return $this->nama_depan;
    }

    public function getNamaBelakang():string {
        return $this->nama_belakang;
    }

    public function getEmail():string {
        return $this->email;
    }

    public function getNomorTelepon():string {
        return $this->nomor_telepon;
    }

    public function getAlamat():string {
        return $this->alamat;
    }
}

?>

<?php

namespace App\DTO;

class BrandDTO {
    public function __construct(
        public ?int $id,
        public string $nama_brand,
        public string $deskripsi,
    )
    {}

    public function getNamaBrand(): string {
        return $this->nama_brand;
    }

    public function setNamaBrand(string $nama_brand): void {
        $this->nama_brand = $nama_brand;
    }

    public function getDeskripsi(): string {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void {
        $this->deskripsi = $deskripsi;
    }
}

?>

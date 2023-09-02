<?php

namespace App\DTO;

class LensCategoryDTO {
    public function __construct(
        public ?int $id,
        public string $nama_kategori,
    )
    {}

    public function getNamaKategori(): string {
        return $this->nama_kategori;
    }

    public function setNamaKategori(string $nama_kategori): void {
        $this->nama_kategori = $nama_kategori;
    }
}

?>

<?php

namespace App\DTO;

class CoaDTO {
    public function __construct(
        public ?int $id,
        public string $kode_coa,
        public string $deskripsi,
        public int $kategori,
    )
    {}

    public function getKodeCoa(): string {
        return $this->kode_coa;
    }

    public function setKodeCoa(string $kode_coa): void {
        $this->kode_coa = $kode_coa;
    }

    public function getDeskripsi(): string {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void {
        $this->deskripsi = $deskripsi;
    }

    public function getKategori(): int {
        return $this->kategori;
    }

    public function setKategori(int $kategori): void {
        $this->kategori = $kategori;
    }
}

?>

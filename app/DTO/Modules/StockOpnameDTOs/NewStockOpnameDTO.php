<?php

namespace App\DTO\Modules\StockOpnameDTOs;

class NewStockOpnameDTO {
    public function __construct(
        public string $tanggal_dibuat,
        public string $bulan,
        public string $tahun,
    )
    {}

    public function getTanggalDibuat(): string {
        return $this->tanggal_dibuat;
    }

    public function getBulan(): string {
        return $this->bulan;
    }

    public function getTahun(): string {
        return $this->tahun;
    }

    public function setTanggalDibuat(string $tanggal_dibuat): void {
        $this->tanggal_dibuat = $tanggal_dibuat;
    }

    public function setBulan(string $bulan): void {
        $this->bulan = $bulan;
    }

    public function setTahun(string $tahun): void {
        $this->tahun = $tahun;
    }
}

?>

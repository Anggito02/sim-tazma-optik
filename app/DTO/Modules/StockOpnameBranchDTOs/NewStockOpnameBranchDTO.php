<?php

namespace App\DTO\Modules\StockOpnameBranchDTOs;

class NewStockOpnameBranchDTO {
    public function __construct(
        public string $tanggal_dibuat,
        public string $bulan,
        public string $tahun,

        public int $branch_id,
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

    public function getBranchId(): int {
        return $this->branch_id;
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

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }
}

?>

<?php

namespace App\DTO\Modules\StockOpnameDTOs;

class StockOpnameInfoDTO {
    public function __construct(
        public int $id,
        public string $tanggal_dibuat,
        public string $bulan,
        public string $tahun,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getTanggalDibuat(): string {
        return $this->tanggal_dibuat;
    }

    public function getBulan(): string {
        return $this->bulan;
    }

    public function getTahun(): string {
        return $this->tahun;
    }
}

?>

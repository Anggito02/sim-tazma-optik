<?php

namespace App\DTO\Modules\StockOpnameDTOs;

class StockOpnameInfoDTO {
    public function __construct(
        private int $id,
        private string $tanggal_dibuat,
        private string $bulan,
        private string $tahun,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'tanggal_dibuat' => $this->getTanggalDibuat(),
            'bulan' => $this->getBulan(),
            'tahun' => $this->getTahun(),
        ];
    }

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

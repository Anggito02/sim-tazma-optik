<?php

namespace App\DTO\Modules\StockOpnameDTOs;

class StockOpnameFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private ?int $bulan,
        private ?int $tahun
    )
    {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getBulan(): ?int
    {
        return $this->bulan;
    }

    public function getTahun(): ?int
    {
        return $this->tahun;
    }
}

?>

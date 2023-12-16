<?php

namespace App\DTO\Modules\StockOpnameBranchDTOs;

class StockOpnameBranchFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private ?int $bulan,
        private ?int $tahun,
        private ?int $branch_id
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

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }
}

?>

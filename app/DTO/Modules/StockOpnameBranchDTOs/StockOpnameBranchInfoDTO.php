<?php

namespace App\DTO\Modules\StockOpnameBranchDTOs;

class StockOpnameBranchInfoDTO {
    public function __construct(
        private int $id,
        private string $tanggal_dibuat,
        private string $bulan,
        private string $tahun,

        private int $branch_id,
        private string $nama_branch
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'tanggal_dibuat' => $this->tanggal_dibuat,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'branch_id' => $this->branch_id,
            'nama_branch' => $this->nama_branch
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

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getNamaBranch(): string {
        return $this->nama_branch;
    }
}

?>

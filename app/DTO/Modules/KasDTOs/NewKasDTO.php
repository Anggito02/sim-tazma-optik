<?php

namespace App\DTO\Modules\KasDTOs;

class NewKasDTO {
    public function __construct(
        private string $tanggal_buka_kas,
        private string $modal_tambahan_harian,
        private string $kas_awal_harian,
        private int $branch_id,
        private int $employee_id,
    ) {}

    public function getTanggalBukaKas(): string
    {
        return $this->tanggal_buka_kas;
    }

    public function getModalTambahanHarian(): string
    {
        return $this->modal_tambahan_harian;
    }

    public function getKasAwalHarian(): string
    {
        return $this->kas_awal_harian;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }
}

?>

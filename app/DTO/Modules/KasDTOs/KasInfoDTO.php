<?php

namespace App\DTO\Modules\KasDTOs;

class KasInfoDTO {
    public function __construct(
        private int $id,
        private string $tanggal_buka_kas,
        private string $tanggal_tutup_kas,
        private string $modal_tambahan_harian,
        private string $kas_awal_harian,
        private string $kas_akhir_harian,
        private int $branch_id,
        private string $kode_branch,
        private string $nama_branch,
        private int $employee_id,
        private string $employee_name,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getTanggalBukaKas(): string
    {
        return $this->tanggal_buka_kas;
    }

    public function getTanggalTutupKas(): string
    {
        return $this->tanggal_tutup_kas;
    }

    public function getModalTambahanHarian(): string
    {
        return $this->modal_tambahan_harian;
    }

    public function getKasAwalHarian(): string
    {
        return $this->kas_awal_harian;
    }

    public function getKasAkhirHarian(): string
    {
        return $this->kas_akhir_harian;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function getKodeBranch(): string
    {
        return $this->kode_branch;
    }

    public function getNamaBranch(): string
    {
        return $this->nama_branch;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }

    public function getEmployeeName(): string
    {
        return $this->employee_name;
    }
}

?>

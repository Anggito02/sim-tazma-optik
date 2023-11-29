<?php

namespace App\DTO\Modules\PengeluaranDTOs;

class NewPengeluaranDTO {
    public function __construct(
        private string $deskripsi,
        private int $jumlah_pengeluaran,
        private string $tanggal_pengeluaran,

        private int $coa_id,
        private int $branch_id,
        private int $made_by,
    ) {}

    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    public function getJumlahPengeluaran(): int
    {
        return $this->jumlah_pengeluaran;
    }

    public function getTanggalPengeluaran(): string
    {
        return $this->tanggal_pengeluaran;
    }

    public function getCoaId(): int
    {
        return $this->coa_id;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function getMadeBy(): int
    {
        return $this->made_by;
    }
}

?>

<?php

namespace App\DTO\Modules\PengeluaranDTOs;

class PengeluaranInfoDTO {
    public function __construct(
        private int $id,
        private string $deskripsi,
        private string $tanggal_pengeluaran,
        private int $jumlah_pengeluaran,
        private int $coa_id,
        private string $kode_coa,
        private int $branch_id,
        private string $kode_branch,
        private string $nama_branch,
        private int $made_by,
        private string $made_by_name,
    ) {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'deskripsi' => $this->deskripsi,
            'tanggal_pengeluaran' => $this->tanggal_pengeluaran,
            'jumlah_pengeluaran' => $this->jumlah_pengeluaran,
            'coa_id' => $this->coa_id,
            'kode_coa' => $this->kode_coa,
            'branch_id' => $this->branch_id,
            'kode_branch' => $this->kode_branch,
            'nama_branch' => $this->nama_branch,
            'made_by' => $this->made_by,
            'made_by_name' => $this->made_by_name,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDeskripsi(): string
    {
        return $this->deskripsi;
    }

    public function getTanggalPengeluaran(): string
    {
        return $this->tanggal_pengeluaran;
    }

    public function getJumlahPengeluaran(): int
    {
        return $this->jumlah_pengeluaran;
    }

    public function getCoaId(): int
    {
        return $this->coa_id;
    }

    public function getKodeCoa(): string
    {
        return $this->kode_coa;
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

    public function getMadeBy(): int
    {
        return $this->made_by;
    }

    public function getMadeByName(): string
    {
        return $this->made_by_name;
    }
}

?>

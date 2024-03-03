<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class SalesMasterKasInDTO {
    public function __construct(
        private int $sales_master_id,
        private string $nomor_transaksi,
        private string $tanggal_transaksi,
        private int $jumlah_pemasukan,

        private int $branch_id,
        private string $kode_branch,
        private string $nama_branch,
        private int $coa_id = 1,
        private string $kode_coa = '1001',
        private int $sales_by,
        private string $sales_by_name
    )
    {}

    public function toArray(): array {
        return [
            'sales_master_id' => $this->sales_master_id,
            'nomor_transaksi' => $this->nomor_transaksi,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'jumlah_pemasukan' => $this->jumlah_pemasukan,
            'branch_id' => $this->branch_id,
            'kode_branch' => $this->kode_branch,
            'nama_branch' => $this->nama_branch,
            'coa_id' => $this->coa_id,
            'kode_coa' => $this->kode_coa,
            'sales_by' => $this->sales_by,
            'sales_by_name' => $this->sales_by_name
        ];
    }

    public function getSalesMasterId() {
        return $this->sales_master_id;
    }

    public function getNomorTransaksi() {
        return $this->nomor_transaksi;
    }

    public function getTanggalTransaksi() {
        return $this->tanggal_transaksi;
    }

    public function getJumlahPemasukan() {
        return $this->jumlah_pemasukan;
    }

    public function getBranchId() {
        return $this->branch_id;
    }

    public function getKodeBranch() {
        return $this->kode_branch;
    }

    public function getNamaBranch() {
        return $this->nama_branch;
    }

    public function getCoaId() {
        return $this->coa_id;
    }

    public function getKodeCoa() {
        return $this->kode_coa;
    }

    public function getSalesBy() {
        return $this->sales_by;
    }

    public function getSalesByName() {
        return $this->sales_by_name;
    }
}

?>

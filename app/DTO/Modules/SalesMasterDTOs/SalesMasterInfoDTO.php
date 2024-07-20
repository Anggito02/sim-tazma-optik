<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class SalesMasterInfoDTO {
    public function __construct(
        private int $id,
        private int $ref_sales_id,
        private string $nomor_transaksi,
        private string $tanggal_transaksi,
        private ?string $sistem_pembayaran,
        private ?string $nomor_kartu,
        private ?string $nomor_referensi,
        private ?float $dp,
        private ?int $total_tagihan,
        private ?int $potongan_manual,
        private ?string $status,
        private bool $verified,

        private int $branch_id,
        private string $nama_branch,
        private int $employee_id,
        private string $employee_name,
        private ?int $customer_id,
        private ?string $customer_nama_depan,
        private ?string $customer_nama_belakang,
        private ?string $customer_nomor_telepon,
        private ?string $customer_alamat,
        private ?string $customer_email
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'ref_sales_id' => $this->ref_sales_id,
            'nomor_transaksi' => $this->nomor_transaksi,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'sistem_pembayaran' => $this->sistem_pembayaran,
            'nomor_kartu' => $this->nomor_kartu,
            'nomor_referensi' => $this->nomor_referensi,
            'dp' => $this->dp,
            'total_tagihan' => $this->total_tagihan,
            'potongan_manual' => $this->potongan_manual,
            'status' => $this->status,
            'verified' => $this->verified,

            'branch_id' => $this->branch_id,
            'nama_branch' => $this->nama_branch,
            'employee_id' => $this->employee_id,
            'employee_name' => $this->employee_name,
            'customer_id' => $this->customer_id,
            'customer_nama_depan' => $this->customer_nama_depan,
            'customer_nama_belakang' => $this->customer_nama_belakang,
            'customer_nomor_telepon' => $this->customer_nomor_telepon,
            'customer_alamat' => $this->customer_alamat,
            'customer_email' => $this->customer_email
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRefSalesId(): int
    {
        return $this->ref_sales_id;
    }

    public function getNomorTransaksi(): string
    {
        return $this->nomor_transaksi;
    }

    public function getTanggalTransaksi(): string
    {
        return $this->tanggal_transaksi;
    }

    public function getSistemPembayaran(): ?string
    {
        return $this->sistem_pembayaran;
    }

    public function getNomorKartu(): ?string
    {
        return $this->nomor_kartu;
    }

    public function getNomorReferensi(): ?string
    {
        return $this->nomor_referensi;
    }

    public function getDp(): ?float
    {
        return $this->dp;
    }

    public function getTotalTagihan(): ?int
    {
        return $this->total_tagihan;
    }

    public function getPotonganManual(): ?int
    {
        return $this->potongan_manual;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getVerified(): bool
    {
        return $this->verified;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
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

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function getCustomerNamaDepan(): ?string
    {
        return $this->customer_nama_depan;
    }

    public function getCustomerNamaBelakang(): ?string
    {
        return $this->customer_nama_belakang;
    }

    public function getCustomerNomorTelepon(): ?string
    {
        return $this->customer_nomor_telepon;
    }

    public function getCustomerAlamat(): ?string
    {
        return $this->customer_alamat;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }
}

?>

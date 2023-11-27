<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class NewSalesMasterDTO {
    public function __construct(
        private int $ref_sales_id,
        private string $nomor_transaksi,
        private string $tanggal_transaksi,
        private ?string $nomor_kartu,
        private ?string $nomor_referensi,

        private int $branch_id,
        private int $employee_id,
        private ?int $customer_id,
    )
    {}

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

    public function getNomorKartu(): ?string
    {
        return $this->nomor_kartu;
    }

    public function getNomorReferensi(): ?string
    {
        return $this->nomor_referensi;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }
}

?>

<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class UpdateSalesMasterDTO {
    public function __construct(
        private int $id,
        private int $ref_sales_id,
        private string $sistem_pembayaran,
        private ?string $nomor_kartu,
        private ?string $nomor_referensi,
        private float $dp,
        private int $total_tagihan,
        private string $status,

        private int $branch_id,
        private int $employee_id,
        private ?int $customer_id,
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getRefSalesId(): int
    {
        return $this->ref_sales_id;
    }

    public function getSistemPembayaran(): string
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

    public function getDp(): float
    {
        return $this->dp;
    }

    public function getTotalTagihan(): int
    {
        return $this->total_tagihan;
    }

    public function getStatus(): string
    {
        return $this->status;
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

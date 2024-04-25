<?php

namespace App\DTO\Modules\CustomerDiagnoseDTOs;

class CustomerDiagnoseFilterDTO {
    public function __construct(
        public int $page,
        public int $limit,
        public ?int $tahun,
        public ?int $bulan,

        // Foreign Key
        // Customer
        public ?int $customer_id,
        public ?string $customer_nama,
        public ?string $customer_nomor_telepon,

        // Branch
        public ?int $branch_check_location_id,

        // Employee
        public ?int $diagnosed_by,
    )
    {}

    public function getPage(): int {
        return $this->page;
    }

    public function getLimit(): int {
        return $this->limit;
    }

    public function getTahun(): ?int {
        return $this->tahun;
    }

    public function getBulan(): ?int {
        return $this->bulan;
    }

    public function getCustomerId(): ?int {
        return $this->customer_id;
    }

    public function getCustomerNama(): ?string {
        return $this->customer_nama;
    }

    public function getCustomerNomorTelepon(): ?string {
        return $this->customer_nomor_telepon;
    }

    public function getBranchCheckLocationId(): ?int {
        return $this->branch_check_location_id;
    }

    public function getDiagnosedBy(): ?int {
        return $this->diagnosed_by;
    }
}

?>

<?php

namespace App\DTO\Customer;

class CustomerFilterDTO
{
    public function __construct(
        private int $page,
        private int $limit,
        private ?string $nama_depan,
        private ?string $nama_belakang,
        private ?int $usia_from,
        private ?int $usia_until,
        private ?string $gender,
        private ?int $branch_id,
        private ?int $kabkota_id
    )
    {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getNamaDepan(): ?string
    {
        return $this->nama_depan;
    }

    public function getNamaBelakang(): ?string
    {
        return $this->nama_belakang;
    }

    public function getUsiaFrom(): ?int
    {
        return $this->usia_from;
    }

    public function getUsiaUntil(): ?int
    {
        return $this->usia_until;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }

    public function getKabkotaId(): ?int
    {
        return $this->kabkota_id;
    }
}

?>

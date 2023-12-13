<?php

namespace App\DTO\Modules\PurchaseOrderDTOs;

class POFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private ?int $bulan,
        private ?int $tahun,
        private ?bool $status_po,
        private ?bool $status_penerimaan,
        private ?bool $status_pembayaran,
        private ?int $vendor_id,
        private ?int $made_by,
        private ?int $checked_by,
        private ?int $approved_by
    )
    {}

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getBulan(): ?int
    {
        return $this->bulan;
    }

    public function getTahun(): ?int
    {
        return $this->tahun;
    }

    public function getStatusPo(): ?bool
    {
        return $this->status_po;
    }

    public function getStatusPenerimaan(): ?bool
    {
        return $this->status_penerimaan;
    }

    public function getStatusPembayaran(): ?bool
    {
        return $this->status_pembayaran;
    }

    public function getVendorId(): ?int
    {
        return $this->vendor_id;
    }

    public function getMadeBy(): ?int
    {
        return $this->made_by;
    }

    public function getCheckedBy(): ?int
    {
        return $this->checked_by;
    }

    public function getApprovedBy(): ?int
    {
        return $this->approved_by;
    }
}

?>

<?php

namespace App\DTO\Modules\PurchaseOrderDTOs;

class NewPODTO {
    public function __construct(
        private string $nomor_po,
        private string $tanggal_dibuat,
        private bool $status_po,
        private bool $status_penerimaan,
        private bool $status_pembayaran,

        private int $vendor_id,
        private int $made_by,
        private int $checked_by,
        private int $approved_by
    )
    {}

    public function getNomorPO(): string
    {
        return $this->nomor_po;
    }

    public function getTanggalDibuat(): string
    {
        return $this->tanggal_dibuat;
    }

    public function getStatusPO(): bool
    {
        return $this->status_po;
    }

    public function getStatusPenerimaan(): bool
    {
        return $this->status_penerimaan;
    }

    public function getStatusPembayaran(): bool
    {
        return $this->status_pembayaran;
    }

    public function getVendorId(): int
    {
        return $this->vendor_id;
    }

    public function getMadeBy(): int
    {
        return $this->made_by;
    }

    public function getCheckedBy(): int
    {
        return $this->checked_by;
    }

    public function getApprovedBy(): int
    {
        return $this->approved_by;
    }
}

?>

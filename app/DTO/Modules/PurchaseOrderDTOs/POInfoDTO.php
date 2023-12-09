<?php

namespace App\DTO\Modules\PurchaseOrderDTOs;

class POInfoDTO {
    public function __construct(
        private int $id,
        private string $nomor_po,
        private string $tanggal_dibuat,
        private bool $status_po,
        private bool $status_penerimaan,
        private bool $status_pembayaran,

        private int $vendor_id,
        private string $nama_vendor,
        private int $made_by,
        private string $made_by_name,
        private int $checked_by,
        private string $checked_by_name,
        private int $approved_by,
        private string $approved_by_name
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nomor_po' => $this->nomor_po,
            'tanggal_dibuat' => $this->tanggal_dibuat,
            'status_po' => $this->status_po,
            'status_penerimaan' => $this->status_penerimaan,
            'status_pembayaran' => $this->status_pembayaran,

            'vendor_id' => $this->vendor_id,
            'nama_vendor' => $this->nama_vendor,
            'made_by' => $this->made_by,
            'made_by_name' => $this->made_by_name,
            'checked_by' => $this->checked_by,
            'checked_by_name' => $this->checked_by_name,
            'approved_by' => $this->approved_by,
            'approved_by_name' => $this->approved_by_name
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNomorPo(): string {
        return $this->nomor_po;
    }

    public function getTanggalDibuat(): string {
        return $this->tanggal_dibuat;
    }

    public function getStatusPo(): bool {
        return $this->status_po;
    }

    public function getStatusPenerimaan(): bool {
        return $this->status_penerimaan;
    }

    public function getStatusPembayaran(): bool {
        return $this->status_pembayaran;
    }

    public function getVendorId(): int {
        return $this->vendor_id;
    }

    public function getNamaVendor(): string {
        return $this->nama_vendor;
    }

    public function getMadeBy(): int {
        return $this->made_by;
    }

    public function getMadeByName(): string {
        return $this->made_by_name;
    }

    public function getCheckedBy(): int {
        return $this->checked_by;
    }

    public function getCheckedByName(): string {
        return $this->checked_by_name;
    }

    public function getApprovedBy(): int {
        return $this->approved_by;
    }

    public function getApprovedByName(): string {
        return $this->approved_by_name;
    }
}

?>

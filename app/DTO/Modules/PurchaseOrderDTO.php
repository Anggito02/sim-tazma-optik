<?php

namespace App\DTO\Modules;

class PurchaseOrderDTO {
    public function __construct(
        public ?int $id,
        public ?string $nomor_po,
        public ?string $tanggal_dibuat,
        public bool $status_po,
        public bool $status_penerimaan,
        public bool $status_pembayaran,

        // Foreign Keys

        // Receive Order
        public ?int $receive_order_id,

        // Vendor
        public int $vendor_id,

        // Employee
        public int $made_by,
        public int $checked_by,
        public int $approved_by
    )
    {}

    public function getNomorPo(): string {
        return $this->nomor_po;
    }

    public function setNomorPo(string $nomor_po): void {
        $this->nomor_po = $nomor_po;
    }

    public function getTanggalDibuat(): string {
        return $this->tanggal_dibuat;
    }

    public function setTanggalDibuat(string $tanggal_dibuat): void {
        $this->tanggal_dibuat = $tanggal_dibuat;
    }

    public function getStatusPo(): bool {
        return $this->status_po;
    }

    public function setStatusPo(bool $status_po): void {
        $this->status_po = $status_po;
    }

    public function getStatusPenerimaan(): bool {
        return $this->status_penerimaan;
    }

    public function setStatusPenerimaan(bool $status_penerimaan): void {
        $this->status_penerimaan = $status_penerimaan;
    }

    public function getStatusPembayaran(): bool {
        return $this->status_pembayaran;
    }

    public function setStatusPembayaran(bool $status_pembayaran): void {
        $this->status_pembayaran = $status_pembayaran;
    }

    public function getReceiveOrderId(): int | null {
        return $this->receive_order_id;
    }

    public function setReceiveOrderId(int $receive_order_id): void {
        $this->receive_order_id = $receive_order_id;
    }

    public function getVendorId(): int {
        return $this->vendor_id;
    }

    public function setVendorId(int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    public function getMadeBy(): int {
        return $this->made_by;
    }

    public function setMadeBy(int $made_by): void {
        $this->made_by = $made_by;
    }

    public function getCheckedBy(): int {
        return $this->checked_by;
    }

    public function setCheckedBy(int $checked_by): void {
        $this->checked_by = $checked_by;
    }

    public function getApprovedBy(): int {
        return $this->approved_by;
    }

    public function setApprovedBy(int $approved_by): void {
        $this->approved_by = $approved_by;
    }
}
?>

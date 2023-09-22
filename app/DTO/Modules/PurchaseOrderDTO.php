<?php

namespace App\DTO\Modules;

class PurchaseOrderDTO {
    public function __construct(
        public ?int $id,
        public ?string $nomor_po,
        public int $qty,
        public string $unit,
        public int $harga_beli_satuan,
        public int $harga_jual_satuan,
        public float $diskon,
        public bool $status_po,
        public bool $status_penerimaan,
        public bool $status_pembayaran,

        // Foreign Keys
        // Vendor
        public int $vendor_id,

        // Item
        public int $item_id,

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

    public function getQty(): int {
        return $this->qty;
    }

    public function setQty(int $qty): void {
        $this->qty = $qty;
    }

    public function getUnit(): string {
        return $this->unit;
    }

    public function setUnit(string $unit): void {
        $this->unit = $unit;
    }

    public function getHargaBeliSatuan(): int {
        return $this->harga_beli_satuan;
    }

    public function setHargaBeliSatuan(int $harga_beli_satuan): void {
        $this->harga_beli_satuan = $harga_beli_satuan;
    }

    public function getHargaJualSatuan(): int {
        return $this->harga_jual_satuan;
    }

    public function setHargaJualSatuan(int $harga_jual_satuan): void {
        $this->harga_jual_satuan = $harga_jual_satuan;
    }

    public function getDiskon(): float {
        return $this->diskon;
    }

    public function setDiskon(float $diskon): void {
        $this->diskon = $diskon;
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

    public function getVendorId(): int {
        return $this->vendor_id;
    }

    public function setVendorId(int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
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

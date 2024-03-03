<?php

namespace App\DTO\Modules\VendorInvoiceDTOs;

class NewVendorInvoiceDTO {
    public function __construct(
        public string $nomor_invoice_vendor,
        public string $nomor_invoice_receive,
        public int $iterasi_pembayaran,
        // public string $bukti_pembayaran_1,
        public bool $status_pembayaran_1,
        // public ?string $bukti_pembayaran_2,
        public ?bool $status_pembayaran_2,
        // public ?string $bukti_pembayaran_3,
        public ?bool $status_pembayaran_3,
        // public ?string $bukti_pembayaran_4,
        public ?bool $status_pembayaran_4,
        public string $status_pembayaran_keseluruhan,

        // Foreign Key
        public int $vendor_id,

        // Purchase Order
        public int $purchase_order_id,

        // Receive Order
        public int $receive_order_id,

        // Employee
        public int $accepted_by,
        public int $checked_by,
        public int $approved_by,
    )
    {}

    public function getNomorInvoiceVendor(): string {
        return $this->nomor_invoice_vendor;
    }

    public function setNomorInvoiceVendor(string $nomor_invoice_vendor): void {
        $this->nomor_invoice_vendor = $nomor_invoice_vendor;
    }

    public function getNomorInvoiceReceive(): string {
        return $this->nomor_invoice_receive;
    }

    public function setNomorInvoiceReceive(string $nomor_invoice_receive): void {
        $this->nomor_invoice_receive = $nomor_invoice_receive;
    }

    public function getIterasiPembayaran(): int {
        return $this->iterasi_pembayaran;
    }

    public function setIterasiPembayaran(int $iterasi_pembayaran): void {
        $this->iterasi_pembayaran = $iterasi_pembayaran;
    }

    // public function getBuktiPembayaran1(): string {
    //     return $this->bukti_pembayaran_1;
    // }

    // public function setBuktiPembayaran1(string $bukti_pembayaran_1): void {
    //     $this->bukti_pembayaran_1 = $bukti_pembayaran_1;
    // }

    public function getStatusPembayaran1(): bool {
        return $this->status_pembayaran_1;
    }

    public function setStatusPembayaran1(bool $status_pembayaran_1): void {
        $this->status_pembayaran_1 = $status_pembayaran_1;
    }

    // public function getBuktiPembayaran2(): ?string {
    //     return $this->bukti_pembayaran_2;
    // }

    // public function setBuktiPembayaran2(?string $bukti_pembayaran_2): void {
    //     $this->bukti_pembayaran_2 = $bukti_pembayaran_2;
    // }

    public function getStatusPembayaran2(): ?bool {
        return $this->status_pembayaran_2;
    }

    public function setStatusPembayaran2(?bool $status_pembayaran_2): void {
        $this->status_pembayaran_2 = $status_pembayaran_2;
    }

    // public function getBuktiPembayaran3(): ?string {
    //     return $this->bukti_pembayaran_3;
    // }

    // public function setBuktiPembayaran3(?string $bukti_pembayaran_3): void {
    //     $this->bukti_pembayaran_3 = $bukti_pembayaran_3;
    // }

    public function getStatusPembayaran3(): ?bool {
        return $this->status_pembayaran_3;
    }

    public function setStatusPembayaran3(?bool $status_pembayaran_3): void {
        $this->status_pembayaran_3 = $status_pembayaran_3;
    }

    // public function getBuktiPembayaran4(): ?string {
    //     return $this->bukti_pembayaran_4;
    // }

    // public function setBuktiPembayaran4(?string $bukti_pembayaran_4): void {
    //     $this->bukti_pembayaran_4 = $bukti_pembayaran_4;
    // }

    public function getStatusPembayaran4(): ?bool {
        return $this->status_pembayaran_4;
    }

    public function setStatusPembayaran4(?bool $status_pembayaran_4): void {
        $this->status_pembayaran_4 = $status_pembayaran_4;
    }

    public function getStatusPembayaranKeseluruhan(): string {
        return $this->status_pembayaran_keseluruhan;
    }

    public function setStatusPembayaranKeseluruhan(string $status_pembayaran_keseluruhan): void {
        $this->status_pembayaran_keseluruhan = $status_pembayaran_keseluruhan;
    }

    public function getVendorId(): int {
        return $this->vendor_id;
    }

    public function setVendorId(int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }

    public function setPurchaseOrderId(int $purchase_order_id): void {
        $this->purchase_order_id = $purchase_order_id;
    }

    public function getReceiveOrderId(): int {
        return $this->receive_order_id;
    }

    public function setReceiveOrderId(int $receive_order_id): void {
        $this->receive_order_id = $receive_order_id;
    }

    public function getAcceptedBy(): int {
        return $this->accepted_by;
    }

    public function setAcceptedBy(int $accepted_by): void {
        $this->accepted_by = $accepted_by;
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

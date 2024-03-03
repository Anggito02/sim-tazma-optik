<?php

namespace App\DTO\Modules\VendorInvoiceDTOs;

class UpdateVendorInvoiceDTO {
    public function __construct(
        public int $id,
        // public string $bukti_pembayaran_1,
        public bool $status_pembayaran_1,
        // public ?string $bukti_pembayaran_2,
        public ?bool $status_pembayaran_2,
        // public ?string $bukti_pembayaran_3,
        public ?bool $status_pembayaran_3,
        // public ?string $bukti_pembayaran_4,
        public ?bool $status_pembayaran_4,
        public string $status_pembayaran_keseluruhan,
    )
    {}
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
}

?>

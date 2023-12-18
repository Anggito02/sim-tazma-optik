<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class VerifySalesMasterDTO {
    public function __construct(
        private int $id,
        private string $sistem_pembayaran,
        private ?string $nomor_kartu,
        private ?string $nomor_referensi,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getSistemPembayaran(): string {
        return $this->sistem_pembayaran;
    }

    public function getNomorKartu(): ?string {
        return $this->nomor_kartu;
    }

    public function getNomorReferensi(): ?string {
        return $this->nomor_referensi;
    }
}

?>

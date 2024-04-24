<?php

namespace App\DTO\Modules\ReturDTOs;

class NewReturDTO {
    public function __construct(
        public string $nomor_retur,
        public string $tanggal_retur,
        public string $tanggal_pengiriman,

        public int $branch_id,

        public int $checked_by,
        public int $approved_by,
        public int $delivered_by,
        public ?int $received_by,
    )
    {}

    public function getNomorRetur(): string {
        return $this->nomor_retur;
    }

    public function getTanggalRetur(): string {
        return $this->tanggal_retur;
    }

    public function getTanggalPengiriman(): string {
        return $this->tanggal_pengiriman;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }


    public function getCheckedBy(): int {
        return $this->checked_by;
    }

    public function getApprovedBy(): int {
        return $this->approved_by;
    }

    public function getDeliveredBy(): int {
        return $this->delivered_by;
    }

    public function getReceivedBy(): ?int {
        return $this->received_by;
    }

    public function setNomorRetur(string $nomor_retur): void {
        $this->nomor_retur = $nomor_retur;
    }

    public function setTanggalRetur(string $tanggal_retur): void {
        $this->tanggal_retur = $tanggal_retur;
    }

    public function setTanggalPengiriman(string $tanggal_pengiriman): void {
        $this->tanggal_pengiriman = $tanggal_pengiriman;
    }

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setCheckedBy(int $checked_by): void {
        $this->checked_by = $checked_by;
    }

    public function setApprovedBy(int $approved_by): void {
        $this->approved_by = $approved_by;
    }

    public function setDeliveredBy(int $delivered_by): void {
        $this->delivered_by = $delivered_by;
    }

    public function setReceivedBy(int $received_by): void {
        $this->received_by = $received_by;
    }
}

?>

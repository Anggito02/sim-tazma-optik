<?php

namespace App\DTO\Modules\ItemOutgoingDTOs;

class NewItemOutgoingDTO {
    public function __construct(
        public string $nomor_outgoing,
        public string $tanggal_outgoing,
        public string $tanggal_pengiriman,

        public int $branch_id,

        public int $known_by,
        public int $checked_by,
        public int $approved_by,
        public int $delivered_by,
        public int $received_by,
    )
    {}

    public function getNomorOutgoing(): string {
        return $this->nomor_outgoing;
    }

    public function getTanggalOutgoing(): string {
        return $this->tanggal_outgoing;
    }

    public function getTanggalPengiriman(): string {
        return $this->tanggal_pengiriman;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getKnownBy(): int {
        return $this->known_by;
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

    public function getReceivedBy(): int {
        return $this->received_by;
    }

    public function setNomorOutgoing(string $nomor_outgoing): void {
        $this->nomor_outgoing = $nomor_outgoing;
    }

    public function setTanggalOutgoing(string $tanggal_outgoing): void {
        $this->tanggal_outgoing = $tanggal_outgoing;
    }

    public function setTanggalPengiriman(string $tanggal_pengiriman): void {
        $this->tanggal_pengiriman = $tanggal_pengiriman;
    }

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setKnownBy(int $known_by): void {
        $this->known_by = $known_by;
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

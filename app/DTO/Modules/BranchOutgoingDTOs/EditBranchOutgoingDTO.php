<?php

namespace App\DTO\Modules\BranchOutgoingDTOs;

class EditBranchOutgoingDTO {
    public function __construct(
        public int $id,
        public string $tanggal_pengiriman,

        public int $branch_from_id,
        public int $branch_to_id,

        public int $known_by,
        public int $checked_by,
        public int $approved_by,
        public int $delivered_by,
        public ?int $received_by,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getTanggalPengiriman(): string {
        return $this->tanggal_pengiriman;
    }

    public function getBranchFromId(): int {
        return $this->branch_from_id;
    }

    public function getBranchToId(): int {
        return $this->branch_to_id;
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

    public function getReceivedBy(): ?int {
        return $this->received_by;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setTanggalPengiriman(string $tanggal_pengiriman): void {
        $this->tanggal_pengiriman = $tanggal_pengiriman;
    }

    public function setBranchFromId(int $branch_from_id): void {
        $this->branch_from_id = $branch_from_id;
    }

    public function setBranchToId(int $branch_to_id): void {
        $this->branch_to_id = $branch_to_id;
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

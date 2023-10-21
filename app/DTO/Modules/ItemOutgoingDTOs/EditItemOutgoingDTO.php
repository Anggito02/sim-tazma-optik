<?php

namespace App\DTO\Modules\ItemOutgoingDTOs;

class EditItemOutgoingDTO {
    public function __construct(
        public int $id,
        public string $tanggal_pengiriman,

        public int $branch_id,

        public int $packed_by,
        public int $checked_by,
        public int $approved_by,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getTanggalPengiriman(): string {
        return $this->tanggal_pengiriman;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getPackedBy(): int {
        return $this->packed_by;
    }

    public function getCheckedBy(): int {
        return $this->checked_by;
    }

    public function getApprovedBy(): int {
        return $this->approved_by;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setTanggalPengiriman(string $tanggal_pengiriman): void {
        $this->tanggal_pengiriman = $tanggal_pengiriman;
    }

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setPackedBy(int $packed_by): void {
        $this->packed_by = $packed_by;
    }

    public function setCheckedBy(int $checked_by): void {
        $this->checked_by = $checked_by;
    }

    public function setApprovedBy(int $approved_by): void {
        $this->approved_by = $approved_by;
    }
}

?>

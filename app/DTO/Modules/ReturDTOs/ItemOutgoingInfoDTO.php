<?php

namespace App\DTO\Modules\ReturDTOs;

class ReturInfoDTO {
    public function __construct(
        public int $id,
        public string $nomor_retur,
        public string $tanggal_retur,
        public string $tanggal_pengiriman,

        public int $branch_id,
        public string $kode_branch,
        public string $nama_branch,

        public ?int $received_by,
        public ?string $received_by_name,

        public int $checked_by,
        public string $checked_by_name,

        public int $approved_by,
        public string $approved_by_name,

        public int $delivered_by,
        public string $delivered_by_name,

    )
    {}

    public function getId(): int {
        return $this->id;
    }

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

    public function getKodeBranch(): string {
        return $this->kode_branch;
    }

    public function getNamaBranch(): string {
        return $this->nama_branch;
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

    public function getDeliveredBy(): int {
        return $this->delivered_by;
    }

    public function getDeliveredByName(): string {
        return $this->delivered_by_name;
    }

    public function getReceivedBy(): ?int {
        return $this->received_by;
    }

    public function getReceivedByName(): ?string {
        return $this->received_by_name;
    }
}

?>

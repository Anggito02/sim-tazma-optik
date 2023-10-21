<?php

namespace App\DTO\Modules\ItemOutgoingDTOs;

class ItemOutgoingInfoDTO {
    public function __construct(
        public int $id,
        public string $nomor_outgoing,
        public string $tanggal_outgoing,
        public string $tanggal_pengiriman,

        public int $branch_id,
        public string $kode_branch,
        public string $nama_branch,

        public int $known_by,
        public string $known_by_name,

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

    public function getKodeBranch(): string {
        return $this->kode_branch;
    }

    public function getNamaBranch(): string {
        return $this->nama_branch;
    }

    public function getKnownBy(): int {
        return $this->known_by;
    }

    public function getKnownByName(): string {
        return $this->known_by_name;
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
}

?>

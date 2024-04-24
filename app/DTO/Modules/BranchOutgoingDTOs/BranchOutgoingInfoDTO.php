<?php

namespace App\DTO\Modules\BranchOutgoingDTOs;

class BranchOutgoingInfoDTO {
    public function __construct(
        public int $id,
        public string $nomor_outgoing,
        public string $tanggal_outgoing,
        public string $tanggal_pengiriman,

        public int $branch_from_id,
        public string $kode_branch_from,
        public string $nama_branch_from,

        public int $branch_to_id,
        public string $kode_branch_to,
        public string $nama_branch_to,

        public int $known_by,
        public string $known_by_name,

        public int $checked_by,
        public string $checked_by_name,

        public int $approved_by,
        public string $approved_by_name,

        public int $delivered_by,
        public string $delivered_by_name,

        public ?int $received_by,
        public ?string $received_by_name,
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

    public function getBranchFromId(): int {
        return $this->branch_from_id;
    }

    public function getKodeBranchFrom(): string {
        return $this->kode_branch_from;
    }

    public function getNamaBranchFrom(): string {
        return $this->nama_branch_from;
    }

    public function getBranchToId(): int {
        return $this->branch_to_id;
    }

    public function getKodeBranchTo(): string {
        return $this->kode_branch_to;
    }

    public function getNamaBranchTo(): string {
        return $this->nama_branch_to;
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

    public function getReceivedBy(): ?int {
        return $this->received_by;
    }

    public function getReceivedByName(): ?string {
        return $this->received_by_name;
    }
}

?>

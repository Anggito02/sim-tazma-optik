<?php

namespace App\DTO\Modules\ItemOutgoingDTOs;

class ItemOutgoingInfoDTO {
    public function __construct(
        public int $id,
        public string $nomor_outgoing,
        public string $tanggal_outgoing,
        public string $tanggal_pengiriman,

        public int $branch_id,
        public string $branch_name,

        public int $packed_by,
        public string $packed_by_name,

        public int $checked_by,
        public string $checked_by_name,

        public int $approved_by,
        public string $approved_by_name,
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
}

?>

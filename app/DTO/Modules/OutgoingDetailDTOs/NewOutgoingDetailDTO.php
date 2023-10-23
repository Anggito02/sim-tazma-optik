<?php

namespace App\DTO\Modules\OutgoingDetailDTOs;

class NewOutgoingDetailDTO {
    public function __construct(
        public int $delivered_qty,

        public int $outgoing_id,
        public int $item_id,
        public int $verified_by,
    )
    {}

    public function getDeliveredQty(): int {
        return $this->delivered_qty;
    }

    public function getOutgoingId(): int {
        return $this->outgoing_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getVerifiedBy(): int {
        return $this->verified_by;
    }

    public function setDeliveredQty(int $delivered_qty): void {
        $this->delivered_qty = $delivered_qty;
    }

    public function setOutgoingId(int $outgoing_id): void {
        $this->outgoing_id = $outgoing_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setVerifiedBy(int $verified_by): void {
        $this->verified_by = $verified_by;
    }
}

?>

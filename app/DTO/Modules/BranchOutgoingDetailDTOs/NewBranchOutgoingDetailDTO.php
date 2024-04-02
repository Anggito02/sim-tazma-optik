<?php

namespace App\DTO\Modules\BranchOutgoingDetailDTOs;

class NewBranchOutgoingDetailDTO {
    public function __construct(
        public int $delivered_qty,

        public int $branch_outgoing_id,
        public int $item_id,
        public int $branch_from_id,
        public int $branch_to_id,
        public int $verified_by,
    )
    {}

    public function getDeliveredQty(): int {
        return $this->delivered_qty;
    }

    public function getBranchOutgoingId(): int {
        return $this->branch_outgoing_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getBranchFromId(): int {
        return $this->branch_from_id;
    }

    public function getBranchToId(): int {
        return $this->branch_to_id;
    }

    public function getVerifiedBy(): int {
        return $this->verified_by;
    }

    public function setDeliveredQty(int $delivered_qty): void {
        $this->delivered_qty = $delivered_qty;
    }

    public function setBranchOutgoingId(int $branch_outgoing_id): void {
        $this->branch_outgoing_id = $branch_outgoing_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setBranchFromId(int $branch_from_id): void {
        $this->branch_from_id = $branch_from_id;
    }

    public function setBranchToId(int $branch_to_id): void {
        $this->branch_to_id = $branch_to_id;
    }

    public function setVerifiedBy(int $verified_by): void {
        $this->verified_by = $verified_by;
    }
}

?>

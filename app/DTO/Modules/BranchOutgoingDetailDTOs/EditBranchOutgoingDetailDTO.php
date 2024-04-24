<?php

namespace App\DTO\Modules\BranchOutgoingDetailDTOs;

class EditBranchOutgoingDetailDTO {
    public function __construct(
        public int $id,
        public int $delivered_qty,

        public int $item_id,

        public int $branch_from_id,
        public int $branch_to_id,

        public int $verified_by,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getDeliveredQty(): int {
        return $this->delivered_qty;
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

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setDeliveredQty(int $delivered_qty): void {
        $this->delivered_qty = $delivered_qty;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setVerifiedBy(int $verified_by): void {
        $this->verified_by = $verified_by;
    }
}

?>

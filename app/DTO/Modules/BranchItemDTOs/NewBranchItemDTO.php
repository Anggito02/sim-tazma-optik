<?php

namespace App\DTO\Modules\BranchItemDTOs;

class NewBranchItemDTO {
    public function __construct(
        public int $item_id,
        public int $branch_id,
    )
    {}

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }
}

?>

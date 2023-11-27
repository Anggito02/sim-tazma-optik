<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class SalesDetailBranchItemDTO {
    public function __construct(
        private int $qty,
        private int $item_id,
        private int $branch_id,
    )
    {}

    public function toArray(): array {
        return [
            'qty' => $this->qty,
            'item_id' => $this->item_id,
            'branch_id' => $this->branch_id,
        ];
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getItemId(): int
    {
        return $this->item_id;
    }

    public function getBranchId(): int
    {
        return $this->branch_id;
    }
}

?>

<?php

namespace App\DTO\Modules\StockOpnameDetailDTOs;

class AdjustInfoSODetailDTO {
    public function __construct(
        public string $adjustment_type,
        public int $adjustment_by,

        // Foreign Keys
        public int $item_id,
        public int $in_out_qty
    )
    {}

    public function getAdjustmentType(): string {
        return $this->adjustment_type;
    }

    public function getAdjustmentBy(): int {
        return $this->adjustment_by;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getInOutQty(): int {
        return $this->in_out_qty;
    }

    public function setAdjustmentType(string $adjustment_type): void {
        $this->adjustment_type = $adjustment_type;
    }

    public function setAdjustmentBy(int $adjustment_by): void {
        $this->adjustment_by = $adjustment_by;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setInOutQty(int $in_out_qty): void {
        $this->in_out_qty = $in_out_qty;
    }
}

?>

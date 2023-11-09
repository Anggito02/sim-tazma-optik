<?php

namespace App\DTO\Modules\StockOpnameBranchDetailDTOs;

class AdjustInfoSOBranchDetailDTO {
    public function __construct(
        public string $adjustment_date,
        public string $adjustment_type,
        public int $adjustment_by,

        // Foreign Keys
        public int $item_id,
        public int $branch_id,
        public int $in_out_qty
    )
    {}

    public function getAdjustmentDate(): string {
        return $this->adjustment_date;
    }

    public function getAdjustmentType(): string {
        return $this->adjustment_type;
    }

    public function getAdjustmentBy(): int {
        return $this->adjustment_by;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getInOutQty(): int {
        return $this->in_out_qty;
    }

    public function setAdjustmentDate(string $adjustment_date): void {
        $this->adjustment_date = $adjustment_date;
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

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setInOutQty(int $in_out_qty): void {
        $this->in_out_qty = $in_out_qty;
    }
}

?>

<?php

namespace App\DTO\Modules\StockOpnameBranchDetailDTOs;

class NewStockOpnameBranchDetailDTO {
    public function __construct(
        public string $so_start,
        public string $so_end,
        public int $actual_qty,
        public int $system_qty,
        public int $diff_qty,
        public int $positive_diff_qty,
        public int $negative_diff_qty,
        public string $adjustment_type,

        // Foreign Keys
        // Item
        public int $item_id,

        // Branch
        public int $branch_id,

        // Employee
        public int $open_by,
        public int $close_by,

        // Stock Opname
        public int $stock_opname_id,
    )
    {}

    public function getSoStart(): string {
        return $this->so_start;
    }

    public function getSoEnd(): string {
        return $this->so_end;
    }

    public function getActualQty(): int {
        return $this->actual_qty;
    }

    public function getSystemQty(): int {
        return $this->system_qty;
    }

    public function getDiffQty(): int {
        return $this->diff_qty;
    }

    public function getPositiveDiffQty(): int {
        return $this->positive_diff_qty;
    }

    public function getNegativeDiffQty(): int {
        return $this->negative_diff_qty;
    }

    public function getAdjustmentType(): string {
        return $this->adjustment_type;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getOpenBy(): int {
        return $this->open_by;
    }

    public function getCloseBy(): int {
        return $this->close_by;
    }

    public function getStockOpnameId(): int {
        return $this->stock_opname_id;
    }
}

?>

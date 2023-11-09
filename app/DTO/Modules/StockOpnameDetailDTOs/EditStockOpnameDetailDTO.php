<?php

namespace App\DTO\Modules\StockOpnameDetailDTOs;

class EditStockOpnameDetailDTO {
    public function __construct(
        public int $id,
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

        // Employee
        public int $open_by,
        public int $close_by
    )
    {}

    public function getId(): int {
        return $this->id;
    }

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

    public function getOpenBy(): int {
        return $this->open_by;
    }

    public function getCloseBy(): int {
        return $this->close_by;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setSoStart(string $so_start): void {
        $this->so_start = $so_start;
    }

    public function setSoEnd(string $so_end): void {
        $this->so_end = $so_end;
    }

    public function setActualQty(int $actual_qty): void {
        $this->actual_qty = $actual_qty;
    }

    public function setSystemQty(int $system_qty): void {
        $this->system_qty = $system_qty;
    }

    public function setDiffQty(int $diff_qty): void {
        $this->diff_qty = $diff_qty;
    }

    public function setPositiveDiffQty(int $positive_diff_qty): void {
        $this->positive_diff_qty = $positive_diff_qty;
    }

    public function setNegativeDiffQty(int $negative_diff_qty): void {
        $this->negative_diff_qty = $negative_diff_qty;
    }

    public function setAdjustmentType(string $adjustment_type): void {
        $this->adjustment_type = $adjustment_type;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setOpenBy(int $open_by): void {
        $this->open_by = $open_by;
    }

    public function setCloseBy(int $close_by): void {
        $this->close_by = $close_by;
    }
}

?>

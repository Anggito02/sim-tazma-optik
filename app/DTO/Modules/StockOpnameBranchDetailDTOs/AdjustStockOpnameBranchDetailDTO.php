<?php

namespace App\DTO\Modules\StockOpnameBranchDetailDTOs;

class AdjustStockOpnameBranchDetailDTO {
    public function __construct(
        public int $id,
        public string $adjustment_date,
        public string $adjustment_followup_note,

        // Foreign Keys
        // Adjustment Employee
        public int $adjustment_by
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getAdjustmentDate(): string {
        return $this->adjustment_date;
    }

    public function getAdjustmentFollowupNote(): string {
        return $this->adjustment_followup_note;
    }

    public function getAdjustmentBy(): int {
        return $this->adjustment_by;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setAdjustmentDate(string $adjustment_date): void {
        $this->adjustment_date = $adjustment_date;
    }

    public function setAdjustmentFollowupNote(string $adjustment_followup_note): void {
        $this->adjustment_followup_note = $adjustment_followup_note;
    }

    public function setAdjustmentBy(int $adjustment_by): void {
        $this->adjustment_by = $adjustment_by;
    }
}

?>

<?php

namespace App\DTO\Modules\StockOpnameDetailDTOs;

class StockOpnameDetailInfoDTO {
    public function __construct(
        private int $id,
        private string $so_start,
        private string $so_end,
        private string $so_duration,
        private int $actual_qty,
        private int $system_qty,
        private int $diff_qty,
        private int $positive_diff_qty,
        private int $negative_diff_qty,
        private string $adjustment_type,
        private string $adjustment_status,
        private ?string $adjustment_date,
        private ?string $adjustment_followup_note,
        private ?int $adjustment_by,
        private ?string $adjustment_by_name,

        private int $item_id,
        private string $kode_item,
        private string $jenis_item,

        private int $open_by,
        private string $open_by_name,

        private int $close_by,
        private string $close_by_name,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'so_start' => $this->getSoStart(),
            'so_end' => $this->getSoEnd(),
            'so_duration' => $this->getSoDuration(),
            'actual_qty' => $this->getActualQty(),
            'system_qty' => $this->getSystemQty(),
            'diff_qty' => $this->getDiffQty(),
            'positive_diff_qty' => $this->getPositiveDiffQty(),
            'negative_diff_qty' => $this->getNegativeDiffQty(),
            'adjustment_type' => $this->getAdjustmentType(),
            'adjustment_status' => $this->getAdjustmentStatus(),
            'adjustment_date' => $this->getAdjustmentDate(),
            'adjustment_followup_note' => $this->getAdjustmentFollowupNote(),
            'adjustment_by' => $this->getAdjustmentBy(),
            'adjustment_by_name' => $this->getAdjustmentByName(),
            'item_id' => $this->getItemId(),
            'kode_item' => $this->getKodeItem(),
            'jenis_item' => $this->getJenisItem(),
            'open_by' => $this->getOpenBy(),
            'open_by_name' => $this->getOpenByName(),
            'close_by' => $this->getCloseBy(),
            'close_by_name' => $this->getCloseByName(),
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getSoStart(): string {
        return $this->so_start;
    }

    public function getSoEnd(): string {
        return $this->so_end;
    }

    public function getSoDuration(): string {
        return $this->so_duration;
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

    public function getAdjustmentStatus(): string {
        return $this->adjustment_status;
    }

    public function getAdjustmentDate(): ?string {
        return $this->adjustment_date;
    }

    public function getAdjustmentFollowupNote(): ?string {
        return $this->adjustment_followup_note;
    }

    public function getAdjustmentBy(): ?int {
        return $this->adjustment_by;
    }

    public function getAdjustmentByName(): ?string {
        return $this->adjustment_by_name;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getJenisItem(): string {
        return $this->jenis_item;
    }

    public function getOpenBy(): int {
        return $this->open_by;
    }

    public function getOpenByName(): string {
        return $this->open_by_name;
    }

    public function getCloseBy(): int {
        return $this->close_by;
    }

    public function getCloseByName(): string {
        return $this->close_by_name;
    }
}

?>

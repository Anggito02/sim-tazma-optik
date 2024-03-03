<?php

namespace App\DTO\Modules\StockOpnameBranchDetailDTOs;

class StockOpnameBranchDetailFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private int $stock_opname_branch_id,
        private ?string $tanggal_so_from,
        private ?string $tanggal_so_until,
        private ?string $adjustment_type,
        private ?string $adjustment_date_from,
        private ?string $adjustment_date_until,
        private ?string $adjustment_status,
        private ?string $jenis_item,
        private ?int $open_by,
        private ?int $closed_by,
        private ?int $adjustment_by
    )
    {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getStockOpnameBranchId(): int
    {
        return $this->stock_opname_branch_id;
    }

    public function getAdjustmentType(): ?string
    {
        return $this->adjustment_type;
    }

    public function getAdjustmentDateFrom(): ?string
    {
        return $this->adjustment_date_from;
    }

    public function getAdjustmentDateUntil(): ?string
    {
        return $this->adjustment_date_until;
    }

    public function getAdjustmentStatus(): ?string
    {
        return $this->adjustment_status;
    }

    public function getJenisItem(): ?string
    {
        return $this->jenis_item;
    }

    public function getOpenBy(): ?int
    {
        return $this->open_by;
    }

    public function getClosedBy(): ?int
    {
        return $this->closed_by;
    }

    public function getAdjustmentBy(): ?int
    {
        return $this->adjustment_by;
    }

    public function getTanggalSoFrom(): ?string
    {
        return $this->tanggal_so_from;
    }

    public function getTanggalSoUntil(): ?string
    {
        return $this->tanggal_so_until;
    }
}

?>

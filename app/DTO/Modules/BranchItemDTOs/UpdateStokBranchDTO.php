<?php

namespace App\DTO\Modules\BranchItemDTOs;

class UpdateStokBranchDTO {
    public function __construct(
        public int $branch_id,
        public int $item_id,
        public int $stok_berubah,
    )
    {}

    public function setBranchId(int $branch_id): void {
        $this->branch_id = $branch_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setStokBerubah(int $stok_branch): void {
        $this->stok_berubah = $stok_branch;
    }

    public function getBranchId(): int {
        return $this->branch_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getStokBerubah(): int {
        return $this->stok_berubah;
    }
}

?>

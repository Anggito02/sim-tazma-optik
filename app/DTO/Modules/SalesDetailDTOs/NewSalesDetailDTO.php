<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class NewSalesDetailDTO {
    public function __construct(
        private string $kode_item,
        private float $harga,
        private int $sales_master_id,
        private int $branch_item_id,
        private int $po_detail_id,
        private int $coa_id,
    )
    {}

    public function getKodeItem(): string
    {
        return $this->kode_item;
    }

    public function getHarga(): float
    {
        return $this->harga;
    }

    public function getSalesMasterId(): int
    {
        return $this->sales_master_id;
    }

    public function getBranchItemId(): int
    {
        return $this->branch_item_id;
    }

    public function getPoDetailId(): int
    {
        return $this->po_detail_id;
    }

    public function getCoaId(): int
    {
        return $this->coa_id;
    }
}

?>

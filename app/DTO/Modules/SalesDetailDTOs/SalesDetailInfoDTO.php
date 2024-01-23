<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class SalesDetailInfoDTO {
    public function __construct(
        private int $id,
        private string $kode_item,
        private float $diskon,
        private int $harga,
        private int $qty,
        private int $sales_master_id,
        private int $branch_item_id,
        private int $po_detail_id,
        private int $coa_id,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'kode_item' => $this->kode_item,
            'diskon' => $this->diskon,
            'harga' => $this->harga,
            'qty' => $this->qty,
            'sales_master_id' => $this->sales_master_id,
            'branch_item_id' => $this->branch_item_id,
            'po_detail_id' => $this->po_detail_id,
            'coa_id' => $this->coa_id,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getKodeItem(): string
    {
        return $this->kode_item;
    }

    public function getHarga(): int
    {
        return $this->harga;
    }

    public function getDiskon(): float
    {
        return $this->diskon;
    }

    public function getQty(): int
    {
        return $this->qty;
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

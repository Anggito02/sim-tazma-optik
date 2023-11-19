<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class SalesDetailInfoDTO {
    public function __construct(
        private int $id,
        private string $kode_item,
        private float $harga,
        private int $qty,
        private int $sales_master_id,
        private int $item_id,
        private int $po_detail_id,
        private int $coa_id,
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getKodeItem(): string
    {
        return $this->kode_item;
    }

    public function getHarga(): float
    {
        return $this->harga;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getSalesMasterId(): int
    {
        return $this->sales_master_id;
    }

    public function getItemId(): int
    {
        return $this->item_id;
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

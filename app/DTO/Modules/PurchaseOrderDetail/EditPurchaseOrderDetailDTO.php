<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class EditPurchaseOrderDetailDTO {
    public function __construct(
        private int $id,
        private int $pre_order_qty,
        private string $unit,
        private int $harga_beli_satuan,
        private int $harga_jual_satuan,
        private float $diskon,
        private int $item_id,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getPreOrderQty(): int {
        return $this->pre_order_qty;
    }

    public function getUnit(): string {
        return $this->unit;
    }

    public function getHargaBeliSatuan(): int {
        return $this->harga_beli_satuan;
    }

    public function getHargaJualSatuan(): int {
        return $this->harga_jual_satuan;
    }

    public function getDiskon(): float {
        return $this->diskon;
    }

    public function getItemId(): int {
        return $this->item_id;
    }
}

?>

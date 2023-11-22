<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class NewPurchaseOrderDetailDTO {
    public function __construct(
        private int $pre_order_qty,
        private string $unit,
        private int $harga_beli_satuan,
        private int $harga_jual_satuan,
        private float $diskon,
        private int $item_id,
        private int $purchase_order_id,
    )
    {}

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

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }
}

?>

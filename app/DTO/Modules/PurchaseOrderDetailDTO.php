<?php

namespace App\DTO\Modules;

class PurchaseOrderDetailDTO {
    public function __construct(
        public ?int $id,
        public int $pre_order_qty,
        public ?int $received_qty,
        public ?int $not_good_qty,
        public string $unit,
        public int $harga_beli_satuan,
        public int $harga_jual_satuan,
        public float $diskon,

        // Foreign Keys
        // Purchase Order
        public int $purchase_order_id,

        // Item
        public int $item_id,
    ) {}

    public function getPreOrderQty(): int {
        return $this->pre_order_qty;
    }

    public function setPreOrderQty(int $pre_order_qty): void {
        $this->pre_order_qty = $pre_order_qty;
    }

    public function getReceivedQty(): int {
        return $this->received_qty;
    }

    public function setReceivedQty(int $received_qty): void {
        $this->received_qty = $received_qty;
    }

    public function getNotGoodQty(): int {
        return $this->not_good_qty;
    }

    public function setNotGoodQty(int $not_good_qty): void {
        $this->not_good_qty = $not_good_qty;
    }

    public function getUnit(): string {
        return $this->unit;
    }

    public function setUnit(string $unit): void {
        $this->unit = $unit;
    }

    public function getHargaBeliSatuan(): int {
        return $this->harga_beli_satuan;
    }

    public function setHargaBeliSatuan(int $harga_beli_satuan): void {
        $this->harga_beli_satuan = $harga_beli_satuan;
    }

    public function getHargaJualSatuan(): int {
        return $this->harga_jual_satuan;
    }

    public function setHargaJualSatuan(int $harga_jual_satuan): void {
        $this->harga_jual_satuan = $harga_jual_satuan;
    }

    public function getDiskon(): float {
        return $this->diskon;
    }

    public function setDiskon(float $diskon): void {
        $this->diskon = $diskon;
    }

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }

    public function setPurchaseOrderId(int $purchase_order_id): void {
        $this->purchase_order_id = $purchase_order_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }
}

?>

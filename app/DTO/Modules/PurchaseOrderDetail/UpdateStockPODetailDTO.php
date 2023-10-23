<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class UpdateStockPODetailDTO {
    public function __construct(
        public int $id,
        public int $receive_qty,
        public int $not_good_qty,

        // Foreign Keys
        // Item
        public int $item_id,

        // Purchase Order
        public int $purchase_order_id,

        // Receive Order
        public int $receive_order_id
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getReceiveQty(): int {
        return $this->receive_qty;
    }

    public function getNotGoodQty(): int {
        return $this->not_good_qty;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }

    public function getReceiveOrderId(): int {
        return $this->receive_order_id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setReceiveQty(int $receive_qty): void {
        $this->receive_qty = $receive_qty;
    }

    public function setNotGoodQty(int $not_good_qty): void {
        $this->not_good_qty = $not_good_qty;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setPurchaseOrderId(int $purchase_order_id): void {
        $this->purchase_order_id = $purchase_order_id;
    }

    public function setReceiveOrderId(int $receive_order_id): void {
        $this->receive_order_id = $receive_order_id;
    }
}

?>

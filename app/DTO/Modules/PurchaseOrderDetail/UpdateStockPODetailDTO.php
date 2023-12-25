<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class UpdateStockPODetailDTO {
    public function __construct(
        private int $id,
        private int $received_qty,
        private int $not_good_qty,
        private ?string $kode_qr_po_detail,

        // Foreign Keys
        // Item
        private int $item_id,

        // Purchase Order
        private int $purchase_order_id,

        // Receive Order
        private int $receive_order_id
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getReceiveQty(): int {
        return $this->received_qty;
    }

    public function getNotGoodQty(): int {
        return $this->not_good_qty;
    }

    public function getKodeQrPoDetail(): ?string {
        return $this->kode_qr_po_detail;
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

    public function setReceiveQty(int $received_qty): void {
        $this->received_qty = $received_qty;
    }

    public function setNotGoodQty(int $not_good_qty): void {
        $this->not_good_qty = $not_good_qty;
    }
}

?>

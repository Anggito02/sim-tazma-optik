<?php

namespace App\DTO\Modules;

class ReceiveOrderDTO {
    public function __construct(
        public ?int $id,
        public string $nomor_receive_order,
        public int $receive_qty,
        public int $not_good_qty,
        public string $tanggal_penerimaan,
        public bool $status_invoice,

        // Foreign Keys
        // Purchase Order
        public int $purchase_order_id,

        // Employee
        public int $received_by,
        public int $checked_by,
        public int $approved_by
    )
    {}

    public function getNomorReceiveOrder(): string {
        return $this->nomor_receive_order;
    }

    public function setNomorReceiveOrder(string $nomor_receive_order): void {
        $this->nomor_receive_order = $nomor_receive_order;
    }

    public function getReceiveQty(): int {
        return $this->receive_qty;
    }

    public function setReceiveQty(int $receive_qty): void {
        $this->receive_qty = $receive_qty;
    }

    public function getNotGoodQty(): int {
        return $this->not_good_qty;
    }

    public function setNotGoodQty(int $not_good_qty): void {
        $this->not_good_qty = $not_good_qty;
    }

    public function getTanggalPenerimaan(): string {
        return $this->tanggal_penerimaan;
    }

    public function setTanggalPenerimaan(string $tanggal_penerimaan): void {
        $this->tanggal_penerimaan = $tanggal_penerimaan;
    }

    public function getStatusInvoice(): bool {
        return $this->status_invoice;
    }

    public function setStatusInvoice(bool $status_invoice): void {
        $this->status_invoice = $status_invoice;
    }

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }

    public function setPurchaseOrderId(int $purchase_order_id): void {
        $this->purchase_order_id = $purchase_order_id;
    }

    public function getReceivedBy(): int {
        return $this->received_by;
    }

    public function setReceivedBy(int $received_by): void {
        $this->received_by = $received_by;
    }

    public function getCheckedBy(): int {
        return $this->checked_by;
    }

    public function setCheckedBy(int $checked_by): void {
        $this->checked_by = $checked_by;
    }

    public function getApprovedBy(): int {
        return $this->approved_by;
    }

    public function setApprovedBy(int $approved_by): void {
        $this->approved_by = $approved_by;
    }
}

?>

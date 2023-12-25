<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class PurchaseOrderDetailInfoDTO {
    public function __construct(
        private int $id,
        private int $pre_order_qty,
        private ?int $received_qty,
        private ?int $not_good_qty,
        private string $unit,
        private int $harga_beli_satuan,
        private int $harga_jual_satuan,
        private float $diskon,
        private ?string $kode_qr_po_detail,

        // Foreign Keys
        // Purchase Order
        private int $purchase_order_id,
        private string $nomor_po,

        // Receive Order
        private ?int $receive_order_id,
        private ?string $nomor_receive_order,

        // Item
        private int $item_id,
        private string $kode_item,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'pre_order_qty' => $this->getPreOrderQty(),
            'received_qty' => $this->getReceivedQty(),
            'not_good_qty' => $this->getNotGoodQty(),
            'unit' => $this->getUnit(),
            'harga_beli_satuan' => $this->getHargaBeliSatuan(),
            'harga_jual_satuan' => $this->getHargaJualSatuan(),
            'diskon' => $this->getDiskon(),
            'kode_qr_po_detail' => $this->getKodeQrPoDetail(),

            // Foreign Keys
            // Purchase Order
            'purchase_order_id' => $this->getPurchaseOrderId(),
            'nomor_po' => $this->getNomorPo(),

            // Receive Order
            'receive_order_id' => $this->getReceiveOrderId(),
            'nomor_receive_order' => $this->getNomorReceiveOrder(),

            // Item
            'item_id' => $this->getItemId(),
            'kode_item' => $this->getKodeItem(),
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPreOrderQty(): int {
        return $this->pre_order_qty;
    }

    public function getReceivedQty(): int|null {
        return $this->received_qty;
    }

    public function getNotGoodQty(): int|null {
        return $this->not_good_qty;
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

    public function getKodeQrPoDetail(): ?string {
        return $this->kode_qr_po_detail;
    }

    public function getPurchaseOrderId(): int {
        return $this->purchase_order_id;
    }

    public function getNomorPo(): string {
        return $this->nomor_po;
    }

    public function getReceiveOrderId(): ?int {
        return $this->receive_order_id;
    }

    public function getNomorReceiveOrder(): ?string {
        return $this->nomor_receive_order;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }
}

?>

<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class PurchaseOrderDetailQRInfoDTO {
    public function __construct(
        private int $po_id,
        private int $item_id,
        private string $kode_item,
        private int $harga
    )
    {}

    public function getQRData():array {
        return [
            'po_id' => $this->getPoId(),
            'item_id' => $this->getItemId(),
            'kode_item' => $this->getKodeItem(),
            'harga' => $this->getHarga(),
        ];
    }

    public function getPoId(): int {
        return $this->po_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getHarga(): int {
        return $this->harga;
    }
}

?>

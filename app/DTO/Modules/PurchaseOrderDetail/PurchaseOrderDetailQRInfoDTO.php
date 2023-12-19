<?php

namespace App\DTO\Modules\PurchaseOrderDetail;

class PurchaseOrderDetailQRInfoDTO {
    public function __construct(
        private int $po_detail_id,
        private int $item_id,
        private string $kode_item,
    )
    {}

    public function getQRData():array {
        return [
            'po_detail_id' => $this->getPoDetailId(),
            'item_id' => $this->getItemId(),
            'kode_item' => $this->getKodeItem(),
        ];
    }

    public function getPoDetailId(): int {
        return $this->po_detail_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }
}

?>

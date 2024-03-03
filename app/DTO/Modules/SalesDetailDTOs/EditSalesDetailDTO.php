<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class EditSalesDetailDTO {
    public function __construct(
        private int $id,
        private int $qty,
        private ?int $potongan_manual
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'qty' => $this->qty,
            'potongan_manual' => $this->potongan_manual
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getPotonganManual(): ?int
    {
        return $this->potongan_manual;
    }
}

?>



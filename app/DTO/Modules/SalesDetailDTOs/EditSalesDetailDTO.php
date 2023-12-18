<?php

namespace App\DTO\Modules\SalesDetailDTOs;

class EditSalesDetailDTO {
    public function __construct(
        private int $id,
        private int $qty,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'qty' => $this->qty,
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
}

?>



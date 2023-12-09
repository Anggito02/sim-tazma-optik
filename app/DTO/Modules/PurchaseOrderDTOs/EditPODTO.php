<?php

namespace App\DTO\Modules\PurchaseOrderDTOs;

class EditPODTO {
    public function __construct(
        private int $id,
        private int $status_po,
        private int $status_penerimaan,
        private int $status_pembayaran,
        private int $vendor_id,
        private int $made_by,
        private int $checked_by,
        private int $approved_by
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatusPo(): int
    {
        return $this->status_po;
    }

    public function getStatusPenerimaan(): int
    {
        return $this->status_penerimaan;
    }

    public function getStatusPembayaran(): int
    {
        return $this->status_pembayaran;
    }

    public function getVendorId(): int
    {
        return $this->vendor_id;
    }

    public function getMadeBy(): int
    {
        return $this->made_by;
    }

    public function getCheckedBy(): int
    {
        return $this->checked_by;
    }

    public function getApprovedBy(): int
    {
        return $this->approved_by;
    }
}

?>

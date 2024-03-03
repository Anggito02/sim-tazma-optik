<?php

namespace App\DTO\Modules\SalesMasterDTOs;

class SalesMasterFilterDTO {
    public function __construct(
        private int $page,
        private int $limit,
        private ?int $branch_id,
        private ?string $nomor_transaksi
    )
    {}

    public function getPage(): int {
        return $this->page;
    }

    public function getLimit(): int {
        return $this->limit;
    }

    public function getBranchId(): ?int {
        return $this->branch_id;
    }

    public function getNomorTransaksi(): ?string {
        return $this->nomor_transaksi;
    }
}

?>

<?php

namespace App\DTO\Modules\Monitoring\Stock;

class StockInfoDTO {
    public function __construct(
        public int $id,
        public string $kode_item,
        public int $bulan,
        public int $tahun,
        public int $stok_total,

        // Foreign Key
        // Item
        public int $item_id,
        public string $jenis_item,
    )
    {}

    public function getId(): int {
        return $this->id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getBulan(): int {
        return $this->bulan;
    }

    public function getTahun(): int {
        return $this->tahun;
    }

    public function getStokTotal(): int {
        return $this->stok_total;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getJenisItem(): string {
        return $this->jenis_item;
    }
}

?>

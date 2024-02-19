<?php

namespace App\DTO\ItemDTOs;

class ItemQRInfoDTO {
    public function __construct(
        private int $id,
        private string $kode_item,
        private int $harga_jual,
        private int $diskon,
    )
    {}

    public function getQRData(): array {
        return [
            'id' => $this->id,
            'kode_item' => $this->kode_item,
            'harga_jual' => $this->harga_jual,
            'diskon' => $this->diskon,
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function setKodeItem(string $kode_item): void {
        $this->kode_item = $kode_item;
    }

    public function getHargaJual(): int {
        return $this->harga_jual;
    }

    public function setHargaJual(int $harga_jual): void {
        $this->harga_jual = $harga_jual;
    }

    public function getDiskon(): int {
        return $this->diskon;
    }

    public function setDiskon(int $diskon): void {
        $this->diskon = $diskon;
    }
}

?>

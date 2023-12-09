<?php

namespace App\DTO\ItemDTOs;

class ItemFilterDTO {
    public function __construct(
        public int $page,
        public int $limit,
        public ?string $jenis_item,
        public ?string $kode_item,
        public int $harga_beli_from,
        public ?int $harga_beli_until,
        public int $harga_jual_from,
        public ?int $harga_jual_until,
        public int $diskon_from,
        public int $diskon_until,
        public ?string $frame_sku_vendor,
        public ?string $frame_sub_kategori,
        public ?string $frame_kode,
        public ?string $lensa_jenis_produk,
        public ?string $lensa_jenis_lensa,
        public ?string $aksesoris_nama_item,
        public ?int $vendor_id,
        public ?int $brand_id,
        public ?int $category_id
    )
    {}

    public function getJenisItem(): ?string {
        return $this->jenis_item;
    }

    public function setJenisItem(?string $jenis_item): void {
        $this->jenis_item = $jenis_item;
    }

    public function getKodeItem(): ?string {
        return $this->kode_item;
    }

    public function setKodeItem(?string $kode_item): void {
        $this->kode_item = $kode_item;
    }

    public function getHargaBeliFrom(): int {
        return $this->harga_beli_from;
    }

    public function setHargaBeliFrom(int $harga_beli_from): void {
        $this->harga_beli_from = $harga_beli_from;
    }

    public function getHargaBeliUntil(): ?int {
        return $this->harga_beli_until;
    }

    public function setHargaBeliUntil(?int $harga_beli_until): void {
        $this->harga_beli_until = $harga_beli_until;
    }

    public function getHargaJualFrom(): int {
        return $this->harga_jual_from;
    }

    public function setHargaJualFrom(int $harga_jual_from): void {
        $this->harga_jual_from = $harga_jual_from;
    }

    public function getHargaJualUntil(): ?int {
        return $this->harga_jual_until;
    }

    public function setHargaJualUntil(?int $harga_jual_until): void {
        $this->harga_jual_until = $harga_jual_until;
    }

    public function getDiskonFrom(): int {
        return $this->diskon_from;
    }

    public function setDiskonFrom(int $diskon_from): void {
        $this->diskon_from = $diskon_from;
    }

    public function getDiskonUntil(): int {
        return $this->diskon_until;
    }

    public function setDiskonUntil(int $diskon_until): void {
        $this->diskon_until = $diskon_until;
    }

    public function getFrameSkuVendor(): ?string {
        return $this->frame_sku_vendor;
    }

    public function setFrameSkuVendor(?string $frame_sku_vendor): void {
        $this->frame_sku_vendor = $frame_sku_vendor;
    }

    public function getFrameSubKategori(): ?string {
        return $this->frame_sub_kategori;
    }

    public function setFrameSubKategori(?string $frame_sub_kategori): void {
        $this->frame_sub_kategori = $frame_sub_kategori;
    }

    public function getFrameKode(): ?string {
        return $this->frame_kode;
    }

    public function setFrameKode(?string $frame_kode): void {
        $this->frame_kode = $frame_kode;
    }

    public function getLensaJenisProduk(): ?string {
        return $this->lensa_jenis_produk;
    }

    public function setLensaJenisProduk(?string $lensa_jenis_produk): void {
        $this->lensa_jenis_produk = $lensa_jenis_produk;
    }

    public function getLensaJenisLensa(): ?string {
        return $this->lensa_jenis_lensa;
    }

    public function setLensaJenisLensa(?string $lensa_jenis_lensa): void {
        $this->lensa_jenis_lensa = $lensa_jenis_lensa;
    }

    public function getAksesorisNamaItem(): ?string {
        return $this->aksesoris_nama_item;
    }

    public function setAksesorisNamaItem(?string $aksesoris_nama_item): void {
        $this->aksesoris_nama_item = $aksesoris_nama_item;
    }

    public function getVendorId(): ?int {
        return $this->vendor_id;
    }

    public function setVendorId(?int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    public function getBrandId(): ?int {
        return $this->brand_id;
    }

    public function setBrandId(?int $brand_id): void {
        $this->brand_id = $brand_id;
    }

    public function getCategoryId(): ?int {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): void {
        $this->category_id = $category_id;
    }
}

?>

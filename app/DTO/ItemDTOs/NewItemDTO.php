<?php

namespace App\DTO\ItemDTOs;

class NewItemDTO {
    public function __construct(
        private string $jenis_item,
        private string $kode_item,
        private string $deskripsi,

        // Frame
        private ?string $frame_sku_vendor,
        private ?string $frame_sub_kategori,
        private ?string $frame_kode,

        // Lens
        private ?string $lensa_jenis_produk,
        private ?string $lensa_jenis_lensa,

        // Accessory
        private ?string $aksesoris_nama_item,
        private ?string $aksesoris_kategori,

        // Foreign Keys
        // BRAND //
        private ?int $brand_id,

        // FRAME //
        private ?int $frame_frame_category_id,
        private ?int $frame_vendor_id,
        private ?int $frame_color_id,

        // LENS //
        private ?int $lensa_lens_category_id,
        private ?int $lensa_index_id,
    )
    {}

    public function getJenisItem(): string {
        return $this->jenis_item;
    }

    public function setJenisItem(string $jenis_item): void {
        $this->jenis_item = $jenis_item;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function setKodeItem(string $kode_item): void {
        $this->kode_item = $kode_item;
    }

    public function getDeskripsi(): string {
        return $this->deskripsi;
    }

    public function setDeskripsi(string $deskripsi): void {
        $this->deskripsi = $deskripsi;
    }


    // Frame
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

    // Lens
    public function getLensaJenisProduk(): ?string {
        return $this->lensa_jenis_produk;
    }

    public function setLensaJenisProduk(?string $lensa_jenis_produk): void {
        $this->lensa_jenis_produk = $lensa_jenis_produk;
    }

    public function getLensaJenisLensa(): ?string {
        return $this->lensa_jenis_lensa;
    }

    public function setLensaJenisLensa(?string $lensa_kategori_lensa): void {
        $this->lensa_jenis_lensa = $lensa_kategori_lensa;
    }

    // Aksesoris
    public function getAksesorisNamaItem(): ?string {
        return $this->aksesoris_nama_item;
    }

    public function setAksesorisNamaItem(?string $aksesoris_nama_item): void {
        $this->aksesoris_nama_item = $aksesoris_nama_item;
    }

    public function getAksesorisKategori(): ?string {
        return $this->aksesoris_kategori;
    }

    public function setAksesorisKategori(?string $aksesoris_kategori): void {
        $this->aksesoris_kategori = $aksesoris_kategori;
    }

    // Foreign Keys
    // BRAND //
    public function getBrandId(): int {
        return $this->brand_id;
    }

    public function setBrandId(int $brand_id): void {
        $this->brand_id = $brand_id;
    }

    // FRAME //
    public function getFrameFrameCategoryId(): ?int {
        return $this->frame_frame_category_id;
    }

    public function setFrameFrameCategoryId(?int $frame_frame_category_id): void {
        $this->frame_frame_category_id = $frame_frame_category_id;
    }

    public function getFrameVendorId(): ?int {
        return $this->frame_vendor_id;
    }

    public function setFrameVendorId(?int $frame_vendor_id): void {
        $this->frame_vendor_id = $frame_vendor_id;
    }

    public function getFrameColorId(): ?int {
        return $this->frame_color_id;
    }

    public function setFrameColorId(?int $frame_color_id): void {
        $this->frame_color_id = $frame_color_id;
    }

    // LENS //
    public function getLensaLensCategoryId(): ?int {
        return $this->lensa_lens_category_id;
    }

    public function setLensaLensCategoryId(?int $lensa_lens_category_id): void {
        $this->lensa_lens_category_id = $lensa_lens_category_id;
    }

    public function getLensaIndexId(): ?int {
        return $this->lensa_index_id;
    }

    public function setLensaIndexId(?int $lensa_index_id): void {
        $this->lensa_index_id = $lensa_index_id;
    }
}

?>

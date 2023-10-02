<?php

namespace App\DTO\Modules;

class ItemDTO {
    public function __construct(
        public ?int $id,
        public ?string $jenis_item,
        public ?string $kode_item,
        public ?string $deskripsi,
        public ?int $stok,
        public string $harga_beli,
        public string $harga_jual,

        // Frame
        public ?string $frame_sku_vendor,
        public ?string $frame_sub_kategori,
        public ?string $frame_kode,

        // Lens
        public ?string $lensa_jenis_produk,
        public ?string $lensa_jenis_lensa,

        // Accessory
        public ?string $aksesoris_nama_item,
        public ?string $aksesoris_kategori,

        // Foreign Keys
        // FRAME //
        public ?int $frame_frame_category_id,
        public ?int $frame_brand_id,
        public ?int $frame_vendor_id,
        public ?int $frame_color_id,

        // LENS //
        public ?int $lensa_lens_category_id,
        public ?int $lensa_brand_id,
        public ?int $lensa_index_id,

        // ACCESSORY //
        public ?int $aksesoris_brand_id,
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

    public function getStok(): string {
        return $this->stok;
    }

    public function setStok(string $stok): void {
        $this->stok = $stok;
    }

    public function getHargaBeli(): string {
        return $this->harga_beli;
    }

    public function setHargaBeli(string $harga_beli): void {
        $this->harga_beli = $harga_beli;
    }

    public function getHargaJual(): string {
        return $this->harga_jual;
    }

    public function setHargaJual(string $harga_jual): void {
        $this->harga_jual = $harga_jual;
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

    public function setLensaJenisLensa(?string $lensa_kategori_lensa): void {
        $this->lensa_jenis_lensa = $lensa_kategori_lensa;
    }

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

    public function getFrameFrameCategoryId(): ?int {
        return $this->frame_frame_category_id;
    }

    public function setFrameFrameCategoryId(?int $frame_frame_category_id): void {
        $this->frame_frame_category_id = $frame_frame_category_id;
    }

    public function getFrameBrandId(): ?int {
        return $this->frame_brand_id;
    }

    public function setFrameBrandId(?int $frame_brand_id): void {
        $this->frame_brand_id = $frame_brand_id;
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

    public function getLensaLensCategoryId(): ?int {
        return $this->lensa_lens_category_id;
    }

    public function setLensaLensCategoryId(?int $lensa_lens_category_id): void {
        $this->lensa_lens_category_id = $lensa_lens_category_id;
    }

    public function getLensaBrandId(): ?int {
        return $this->lensa_brand_id;
    }

    public function setLensaBrandId(?int $lensa_brand_id): void {
        $this->lensa_brand_id = $lensa_brand_id;
    }

    public function getLensaIndexId(): ?int {
        return $this->lensa_index_id;
    }

    public function setLensaIndexId(?int $lensa_index_id): void {
        $this->lensa_index_id = $lensa_index_id;
    }

    public function getAksesorisBrandId(): ?int {
        return $this->aksesoris_brand_id;
    }

    public function setAksesorisBrandId(?int $aksesoris_brand_id): void {
        $this->aksesoris_brand_id = $aksesoris_brand_id;
    }
}

?>

<?php

namespace App\DTO\ItemDTOs;

class ItemInfoDTO {
    public function __construct(
        private int $id,
        private string $jenis_item,
        private string $kode_item,
        private string $deskripsi,
        private int $stok,
        private int $harga_beli,
        private int $harga_jual,
        private float $diskon,
        private ?string $qr_path,
        private bool $deleteable,

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
        private int $brand_id,
        private string $nama_brand,

        // FRAME //
        private ?int $frame_frame_category_id,
        private ?string $frame_nama_kategori,
        private ?int $frame_vendor_id,
        private ?string $frame_nama_vendor,
        private ?int $frame_color_id,
        private ?string $frame_nama_warna,

        // LENS //
        private ?int $lensa_lens_category_id,
        private ?string $lensa_nama_kategori,
        private ?int $lensa_index_id,
        private ?string $lensa_nama_index,
    )
    {}

    public function toArray(): array {
        return [
            'id' => $this->id,
            'jenis_item' => $this->jenis_item,
            'kode_item' => $this->kode_item,
            'deskripsi' => $this->deskripsi,
            'stok' => $this->stok,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'diskon' => $this->diskon,
            'qr_path' => $this->qr_path,
            'deleteable' => $this->deleteable,

            // Frame
            'frame_sku_vendor' => $this->frame_sku_vendor,
            'frame_sub_kategori' => $this->frame_sub_kategori,
            'frame_kode' => $this->frame_kode,

            // Lens
            'lensa_jenis_produk' => $this->lensa_jenis_produk,
            'lensa_jenis_lensa' => $this->lensa_jenis_lensa,

            // Accessory
            'aksesoris_nama_item' => $this->aksesoris_nama_item,
            'aksesoris_kategori' => $this->aksesoris_kategori,

            // Foreign Keys
            // BRAND //
            'brand_id' => $this->brand_id,
            'nama_brand' => $this->nama_brand,

            // FRAME //
            'frame_frame_category_id' => $this->frame_frame_category_id,
            'frame_nama_kategori' => $this->frame_nama_kategori,
            'frame_vendor_id' => $this->frame_vendor_id,
            'frame_nama_vendor' => $this->frame_nama_vendor,
            'frame_color_id' => $this->frame_color_id,
            'frame_nama_warna' => $this->frame_nama_warna,

            // LENS //
            'lensa_lens_category_id' => $this->lensa_lens_category_id,
            'lensa_nama_kategori' => $this->lensa_nama_kategori,
            'lensa_index_id' => $this->lensa_index_id,
            'lensa_nama_index' => $this->lensa_nama_index,
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getJenisItem(): string {
        return $this->jenis_item;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getDeskripsi(): string {
        return $this->deskripsi;
    }

    public function getStok(): int {
        return $this->stok;
    }

    public function getHargaBeli(): int {
        return $this->harga_beli;
    }

    public function getHargaJual(): int {
        return $this->harga_jual;
    }

    public function getDiskon(): float {
        return $this->diskon;
    }

    public function getQrPath(): ?string {
        return $this->qr_path;
    }

    public function getDeleteable(): bool {
        return $this->deleteable;
    }

    // Frame
    public function getFrameSkuVendor(): ?string {
        return $this->frame_sku_vendor;
    }

    public function getFrameSubKategori(): ?string {
        return $this->frame_sub_kategori;
    }

    public function getFrameKode(): ?string {
        return $this->frame_kode;
    }

    // Lens
    public function getLensaJenisProduk(): ?string {
        return $this->lensa_jenis_produk;
    }

    public function getLensaJenisLensa(): ?string {
        return $this->lensa_jenis_lensa;
    }

    // Accessory
    public function getAksesorisNamaItem(): ?string {
        return $this->aksesoris_nama_item;
    }

    public function getAksesorisKategori(): ?string {
        return $this->aksesoris_kategori;
    }

    // Foreign Keys
    // BRAND //
    public function getBrandId(): int {
        return $this->brand_id;
    }

    public function getNamaBrand(): string {
        return $this->nama_brand;
    }

    // FRAME //
    public function getFrameFrameCategoryId(): ?int {
        return $this->frame_frame_category_id;
    }

    public function getFrameNamaKategori(): ?string {
        return $this->frame_nama_kategori;
    }

    public function getFrameVendorId(): ?int {
        return $this->frame_vendor_id;
    }

    public function getFrameNamaVendor(): ?string {
        return $this->frame_nama_vendor;
    }

    public function getFrameColorId(): ?int {
        return $this->frame_color_id;
    }

    public function getFrameNamaWarna(): ?string {
        return $this->frame_nama_warna;
    }

    // LENS //
    public function getLensaLensCategoryId(): ?int {
        return $this->lensa_lens_category_id;
    }

    public function getLensaNamaKategori(): ?string {
        return $this->lensa_nama_kategori;
    }

    public function getLensaIndexId(): ?int {
        return $this->lensa_index_id;
    }

    public function getLensaNamaIndex(): ?string {
        return $this->lensa_nama_index;
    }
}

?>

<?php

namespace App\DTO\ItemDTOs;

class UpdateItemDTO {
    public function __construct(
        private int $id,
        private string $deskripsi,
        private int $stok,
        private int $harga_beli,
        private int $harga_jual,
        private float $diskon,

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

    public function getId(): int {
        return $this->id;
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
    public function getBrandId(): ?int {
        return $this->brand_id;
    }

    // FRAME //
    public function getFrameFrameCategoryId(): ?int {
        return $this->frame_frame_category_id;
    }

    public function getFrameVendorId(): ?int {
        return $this->frame_vendor_id;
    }

    public function getFrameColorId(): ?int {
        return $this->frame_color_id;
    }

    // LENS //
    public function getLensaLensCategoryId(): ?int {
        return $this->lensa_lens_category_id;
    }

    public function getLensaIndexId(): ?int {
        return $this->lensa_index_id;
    }
}

?>

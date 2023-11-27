<?php

namespace App\DTO\ItemDTOs;

class UpdateItemDTO {
    public function __construct(
        private int $id,
        private string $kode_item,
        private string $deskripsi,
        private int $stok,
        private int $harga_beli,
        private int $harga_jual,
        private float $diskon,
        private ?string $qr_path,

        // Frame
        private ?string $frame_sku_vendor,
        private ?string $frame_sub_kategori,
        private ?string $frame_kode,

        // Lens
        private ?string $lensa_jenis_produk,
        private ?string $lensa_jenis_lensa,

        // Accessory
        private ?string $aksesoris_nama_item,

        // Foreign Keys
        // BRAND //
        private int $brand_id,

        // VENDOR //
        private int $vendor_id,

        // CATEGORY //
        private int $category_id,

        // FRAME //
        private ?int $frame_color_id,

        // LENS //
        private ?int $lensa_index_id,
    )
    {}

    public function getId(): int {
        return $this->id;
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

    // Foreign Keys
    // BRAND //
    public function getBrandId(): ?int {
        return $this->brand_id;
    }

    // VENDOR //
    public function getVendorId(): ?int {
        return $this->vendor_id;
    }

    // CATEGORY //
    public function getCategoryId(): ?int {
        return $this->category_id;
    }

    // FRAME //
    public function getFrameColorId(): ?int {
        return $this->frame_color_id;
    }

    // LENS //
    public function getLensaIndexId(): ?int {
        return $this->lensa_index_id;
    }
}

?>

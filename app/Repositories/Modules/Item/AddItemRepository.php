<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\Modules\ItemDTO;
use App\Models\Modules\Item;

class AddItemRepository {
    /**
     * Add item
     * @param ItemDTO $itemDTO
     * @return ItemDTO
     */
    public function addItem(ItemDTO $itemDTO) {
        try {
            $newItem = new Item();
            $newItem->kode_item = $itemDTO->getKodeItem();
            $newItem->jenis_item = $itemDTO->getJenisItem();
            $newItem->deskripsi = $itemDTO->getDeskripsi();

            // Frame
            $newItem->frame_sku_vendor = $itemDTO->getFrameSkuVendor();
            $newItem->frame_sub_kategori = $itemDTO->getFrameSubKategori();
            $newItem->frame_kode = $itemDTO->getFrameKode();
            $newItem->frame_harga_beli = $itemDTO->getFrameHargaBeli();
            $newItem->frame_harga_jual = $itemDTO->getFrameHargaJual();

            // Lens
            $newItem->lensa_jenis_produk = $itemDTO->getLensaJenisProduk();
            $newItem->lensa_kategori_lensa = $itemDTO->getLensaKategoriLensa();
            $newItem->lensa_harga_beli = $itemDTO->getLensaHargaBeli();
            $newItem->lensa_harga_jual = $itemDTO->getLensaHargaJual();

            // Accessory
            $newItem->aksesoris_nama_item = $itemDTO->getAksesorisNamaItem();
            $newItem->aksesoris_kategori = $itemDTO->getAksesorisKategori();
            $newItem->aksesoris_harga_beli = $itemDTO->getAksesorisHargaBeli();
            $newItem->aksesoris_harga_jual = $itemDTO->getAksesorisHargaJual();

            // Foreign Keys
            $newItem->frame_frame_category_id = $itemDTO->getFrameFrameCategoryId();
            $newItem->frame_brand_id = $itemDTO->getFrameBrandId();
            $newItem->frame_vendor_id = $itemDTO->getFrameVendorId();
            $newItem->frame_color_id = $itemDTO->getFrameColorId();

            $newItem->lensa_lens_category_id = $itemDTO->getLensaLensCategoryId();
            $newItem->lensa_brand_id = $itemDTO->getLensaBrandId();
            $newItem->lensa_index_id = $itemDTO->getLensaIndexId();

            $newItem->aksesoris_brand_id = $itemDTO->getAksesorisBrandId();

            $newItem->save();

            return $newItem;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

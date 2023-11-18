<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\UpdateItemDTO;
use App\Models\Modules\Item;

class EditItemRepository {
    /**
     * Edit item
     * @param UpdateItemDTO $itemDTO
     * @return ItemDTO
     */
    public function editItem(UpdateItemDTO $itemDTO) {
        try {
            $item = Item::find($itemDTO->getId());

            $item->deskripsi = $itemDTO->getDeskripsi();
            $item->stok = $itemDTO->getStok();
            $item->harga_beli = $itemDTO->getHargaBeli();
            $item->harga_jual = $itemDTO->getHargaJual();
            $item->diskon = $itemDTO->getDiskon();

            // Frame
            $item->frame_sku_vendor = $itemDTO->getFrameSkuVendor();
            $item->frame_sub_kategori = $itemDTO->getFrameSubKategori();
            $item->frame_kode = $itemDTO->getFrameKode();

            // Lens
            $item->lensa_jenis_produk = $itemDTO->getLensaJenisProduk();
            $item->lensa_jenis_lensa = $itemDTO->getLensaJenisLensa();

            // Accessory
            $item->aksesoris_nama_item = $itemDTO->getAksesorisNamaItem();
            $item->aksesoris_kategori = $itemDTO->getAksesorisKategori();

            // Foreign Keys
            // BRAND //
            $item->brand_id = $itemDTO->getBrandId();

            // FRAME //
            $item->frame_frame_category_id = $itemDTO->getFrameFrameCategoryId();
            $item->frame_vendor_id = $itemDTO->getFrameVendorId();
            $item->frame_color_id = $itemDTO->getFrameColorId();

            // LENS //
            $item->lensa_lens_category_id = $itemDTO->getLensaLensCategoryId();
            $item->lensa_index_id = $itemDTO->getLensaIndexId();

            $item->save();

            return $item;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

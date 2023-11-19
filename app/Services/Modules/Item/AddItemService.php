<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\NewItemDTO;

use App\Repositories\Modules\Item\AddItemRepository;

class AddItemService {
    public function __construct(
        private AddItemRepository $itemRepository
    ) {}

    /**
     * Add item
     * @param Request $request
     * @return ItemDTO
     */
    public function addItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'jenis_item' => 'required|in:frame,lensa,aksesoris',
                'deskripsi' => 'required',

                // Kebutuhan penamaan otomatis
                'sku_vendor' => 'required',
                'nama_brand_item' => 'required|exists:brands,nama_brand',
                'warna_item' => 'required_if:jenis_item,frame|nullable',

                'index_lensa' => 'required_if:jenis_item,lensa|nullable',

                // Frame
                'frame_sub_kategori' => 'required_if:jenis_item,frame|nullable',
                'frame_kode' => 'required_if:jenis_item,frame|nullable',

                // Lens
                'lensa_jenis_produk' => 'required_if:jenis_item,lensa|nullable',
                'lensa_jenis_lensa' => 'required_if:jenis_item,lensa|nullable',

                // Accessory
                'aksesoris_nama_item' => 'required_if:jenis_item,aksesoris|nullable',
                'aksesoris_kategori' => 'required_if:jenis_item,aksesoris|nullable',

                // Foreign Keys
                // BRAND //
                'brand_id' => 'required|exists:brands,id',

                'vendor_id' => 'required|exists:vendors,id',

                // FRAME //
                'frame_frame_category_id' => 'required_if:jenis_item,frame|exists:frame_categories,id|nullable',
                'frame_color_id' => 'required_if:jenis_item,frame|exists:colors,id|nullable',

                // LENS //
                'lensa_lens_category_id' => 'required_if:jenis_item,lensa|exists:lens_categories,id|nullable',
                'lensa_index_id' => 'required_if:jenis_item,lensa|exists:indices,id|nullable',
            ]);

            // Auto naming kode_item
            $kode_item = "";
            if ($request->jenis_item == 'frame') {
                $kode_item = $request->nama_brand_item.'-'.$request->sku_vendor.'-';

                $kode_warna = explode(" ", $request->warna_item);
                foreach ($kode_warna as $warna) {
                    $kode_item .= substr($warna, 0, 3);
                }
            }

            if ($request->jenis_item == 'lensa') {
                $kode_item = $request->nama_brand_item.'-'.$request->lensa_jenis_produk.'-'.$request->index_lensa.'-'.$request->lensa_jenis_lensa;
            }

            if ($request->jenis_item == 'aksesoris') {
                $kode_item = $request->aksesoris_nama_item.'-'.$request->nama_brand_item.'-'.$request->aksesoris_kategori;
            }

            $itemDTO = new NewItemDTO(
                $request->jenis_item,
                $kode_item,
                $request->deskripsi,

                // Frame
                $request->frame_sub_kategori,
                $request->frame_kode,

                // Lens
                $request->lensa_jenis_produk,
                $request->lensa_jenis_lensa,

                // Accessory
                $request->aksesoris_nama_item,
                $request->aksesoris_kategori,

                // Foreign Keys
                // BRAND //
                $request->brand_id,

                // VENDOR //
                $request->vendor_id,

                // FRAME //
                $request->frame_frame_category_id,
                $request->frame_color_id,

                // LENS //
                $request->lensa_lens_category_id,
                $request->lensa_index_id,
            );

            $newItem = $this->itemRepository->addItem($itemDTO);

            return $newItem;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

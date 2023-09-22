<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ItemDTO;

use App\Repositories\Modules\Item\EditItemRepository;

class EditItemService {
    public function __construct(
        private EditItemRepository $itemRepository
    ) {}

    /**
     * Edit item
     * @param Request $request
     * @return ItemDTO
     */
    public function editItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:items,id',
                'jenis_item' => 'required|in:frame,lensa,aksesoris',
                'deskripsi' => 'required',

                // Frame
                'frame_sku_vendor' => 'required_if:jenis_item,frame',
                'frame_sub_kategori' => 'required_if:jenis_item,frame',
                'frame_kode' => 'required_if:jenis_item,frame',
                'frame_harga_beli' => 'required_if:jenis_item,frame',

                // Lens
                'lensa_jenis_produk' => 'required_if:jenis_item,lensa',
                'lensa_jenis_lensa' => 'required_if:jenis_item,lensa',
                'lensa_harga_beli' => 'required_if:jenis_item,lensa',
                'lensa_harga_jual' => 'required_if:jenis_item,lensa',

                // Accessory
                'aksesoris_nama_item' => 'required_if:jenis_item,aksesoris',
                'aksesoris_kategori' => 'required_if:jenis_item,aksesoris',
                'aksesoris_harga_beli' => 'required_if:jenis_item,aksesoris',
                'aksesoris_harga_jual' => 'required_if:jenis_item,aksesoris',

                // Foreign Keys
                // FRAME //
                'frame_frame_category_id' => 'required_if:jenis_item,frame|exists:frame_categories,id',
                'frame_brand_id' => 'required_if:jenis_item,frame|exists:brands,id',
                'frame_vendor_id' => 'required_if:jenis_item,frame|exists:vendors,id',
                'frame_color_id' => 'required_if:jenis_item,frame|exists:colors,id',

                // LENS //
                'lensa_lens_category_id' => 'required_if:jenis_item,lensa|exists:lens_categories,id',
                'lensa_brand_id' => 'required_if:jenis_item,lensa|exists:brands,id',

                // ACCESSORY //
                'aksesoris_brand_id' => 'required_if:jenis_item,aksesoris|exists:brands,id',
            ]);

            $itemDto = new ItemDTO(
                $request->id,
                $request->jenis_item,
                null,
                $request->deskripsi,

                // Frame
                $request->frame_sku_vendor,
                $request->frame_sub_kategori,
                $request->frame_kode,
                $request->frame_harga_beli,
                $request->frame_harga_jual,

                // Lens
                $request->lensa_jenis_produk,
                $request->lensa_jenis_lensa,
                $request->lensa_harga_beli,
                $request->lensa_harga_jual,

                // Accessory
                $request->aksesoris_nama_item,
                $request->aksesoris_kategori,
                $request->aksesoris_harga_beli,
                $request->aksesoris_harga_jual,

                // Foreign Keys
                // FRAME //
                $request->frame_frame_category_id,
                $request->frame_brand_id,
                $request->frame_vendor_id,
                $request->frame_color_id,

                // LENS //
                $request->lensa_lens_category_id,
                $request->lensa_brand_id,
                $request->lensa_index_id,

                // ACCESSORY //
                $request->aksesoris_brand_id,
            );

            return $this->itemRepository->editItem($itemDto);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

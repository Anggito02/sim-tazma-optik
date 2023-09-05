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
                'id' => 'required',
                'jenis_item' => 'required|in:frame,lensa,aksesori',
                'deskripsi' => 'required',

                // Frame
                'frame_sku_vendor' => 'required_if:jenis_item,frame',
                'frame_sub_kategori' => 'required_if:jenis_item,frame',
                'frame_kode' => 'required_if:jenis_item,frame',
                'frame_harga_beli' => 'required_if:jenis_item,frame',

                // Lens
                'lensa_jenis_produk' => 'required_if:jenis_item,lensa',
                'lensa_kategori_lensa' => 'required_if:jenis_item,lensa',
                'lensa_harga_beli' => 'required_if:jenis_item,lensa',

                // Accessory
                'aksesoris_nama_item' => 'required_if:jenis_item,aksesori',

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
                'aksesoris_brand_id' => 'required_if:jenis_item,aksesori|exists:brands,1
                id',
            ]);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

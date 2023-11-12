<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\ItemDTO;
use Illuminate\Support\Facades\Storage;

class GetQRItemService {
    /**
     * Get QR item
     * @return ItemDTO
     */
    public function getQRItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:items,id',
                'kode_item' => 'required|exists:items,kode_item'
            ]);

            // Get QR
            $qr_path = 'qr/item'. $request->id . '_' . $request->kode_item . '.png';
            $qr_image = Storage::get($qr_path);

            return $qr_image;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\Item;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ItemDTOs\ItemInfoDTO;

use App\Repositories\Modules\Item\GetItemRepository;

class GetItemByQrService {
    public function __construct(
        private GetItemRepository $itemRepository
    ) {}

    /**
     * Get item by qr
     * @param Request $request
     * @return ItemInfoDTO
     */
    public function getItem(Request $request) {
        try {
            // Validate request
            $request->validate([
                'kode_qr_po_detail' => 'required|exists:purchase_order_details,kode_qr_po_detail',
            ]);

            $item_id = explode("-", substr($request->kode_qr_po_detail, 3))[0];

            $itemDTO = $this->itemRepository->getItem($item_id);

            $itemArray = $itemDTO->toArray();

            return $itemArray;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

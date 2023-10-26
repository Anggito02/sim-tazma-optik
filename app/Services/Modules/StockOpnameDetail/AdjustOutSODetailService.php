<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustInfoSODetailDTO;

use App\Repositories\Modules\Item\GetItemRepository;

class AdjustOutSODetailService {
    public function __construct(

        private GetItemRepository $getItemRepository,
    )
    {}

    /**
     * Make Adjustment Stock Opname Detail
     * @param AdjustInfoSODetailDTO $adjustInfoSODetailDTO
     * @return AdjustStockOpnameDetailRepository
     */
    public function makeAdjustmentSODetail(AdjustInfoSODetailDTO $adjustInfoSODetailDTO) {
        try {
            $adjustment_by = $adjustInfoSODetailDTO->adjustment_by;
            $item_id = $adjustInfoSODetailDTO->item_id;
            $in_out_qty = $adjustInfoSODetailDTO->in_out_qty;

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($item_id);


        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

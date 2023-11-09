<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\EditStockOpnameDetailDTO;

use App\Repositories\Modules\StockOpnameDetail\EditStockOpnameDetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;

class EditStockOpnameDetailService {
    public function __construct(
        private EditStockOpnameDetailRepository $editStockOpnameDetailRepository,
        private GetItemRepository $getItemRepository,
    )
    {}

    /**
     * Edit Stock Opname Detail
     * @param Request $request
     * @return EditStockOpnameDetailDTO
     */
    public function editStockOpnameDetail(Request $request) {
        try {
            // validate request
            $request->validate([
                'id' => 'required|exists:stock_opname_details,id',
                'so_start' => 'required|date_format:Y-m-d H:i:s',
                'so_end' => 'required|date_format:Y-m-d H:i:s',
                'actual_qty' => 'required|numeric|min:0',
                'item_id' => 'required|exists:items,id',
                'open_by' => 'required|exists:users,id',
                'close_by' => 'required|exists:users,id',
            ]);

            // Get Item stock
            $item = $this->getItemRepository->getItem($request->item_id);
            $system_stok = $item->getStok();

            // calculate diff_qty
            $diff_qty = $request->actual_qty - $system_stok;

            $positive_diff_qty = 0;
            $negative_diff_qty = 0;
            $adjustment_type = 'NONE';
            // calculate positive_diff_qty and negative_diff_qty
            if ($diff_qty > 0) {
                $positive_diff_qty = $diff_qty;
                $adjustment_type = 'IN';
            } else if ($diff_qty < 0){
                $negative_diff_qty = $diff_qty;
                $adjustment_type = 'OUT';
            }

            $editStockOpnameDetailDTO = new EditStockOpnameDetailDTO(
                $request->id,
                $request->so_start,
                $request->so_end,
                $request->actual_qty,
                $system_stok,
                $diff_qty,
                $positive_diff_qty,
                $negative_diff_qty,
                $adjustment_type,
                $request->item_id,
                $request->open_by,
                $request->close_by,
            );

            $stockOpnameDetail = $this->editStockOpnameDetailRepository->editStockOpnameDetail($editStockOpnameDetailDTO);

            return $stockOpnameDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\NewStockOpnameDetailDTO;

use App\Repositories\Modules\StockOpnameDetail\AddStockOpnameDetailRepository;

use App\Repositories\Modules\Item\GetItemRepository;

class AddStockOpnameDetailService {
    public function __construct(
        private AddStockOpnameDetailRepository $addStockOpnameDetailRepository,

        private GetItemRepository $getItemRepository,
    )
    {}

    /**
     * Add Stock Opname Detail
     * @param Request $request
     * @return NewStockOpnameDetailDTO
     */
    public function addStockOpnameDetail(Request $request) {
        try {
            // validate request
            $request->validate([
                'item_id' => 'required|exists:items,id',
                'so_start' => 'required|date_format:Y-m-d H:i:s',
                'so_end' => 'required|date_format:Y-m-d H:i:s',
                'actual_qty' => 'required|numeric|min:0',
                'open_by' => 'required|exists:users,id',
                'close_by' => 'required|exists:users,id',
                'stock_opname_id' => 'required|exists:stock_opname_masters,id',
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

            $newStockOpnameDetailDTO = new NewStockOpnameDetailDTO(
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
                $request->stock_opname_id,
            );

            $stock_opname_detail = $this->addStockOpnameDetailRepository->addStockOpnameDetail($newStockOpnameDetailDTO);

            return $stock_opname_detail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

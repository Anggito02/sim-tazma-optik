<?php

namespace App\Services\Modules\StockOpnameBranchDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\NewStockOpnameBranchDetailDTO;

use App\Repositories\Modules\StockOpnameBranchDetail\AddStockOpnameBranchDetailRepository;

use App\Repositories\Modules\BranchItem\GetBranchItemRepository;

class AddStockOpnameBranchDetailService {
    public function __construct(
        private AddStockOpnameBranchDetailRepository $addStockOpnameBranchDetailRepository,

        private GetBranchItemRepository $getBranchItemRepository,
    )
    {}

    /**
     * Add Stock Opname Branch Detail
     * @param Request $request
     * @return NewStockOpnameBranchDetailDTO
     */
    public function addStockOpnameBranchDetail(Request $request) {
        try {
            // validate request
            $request->validate([
                'so_start' => 'required|date_format:Y-m-d H:i:s',
                'so_end' => 'required|date_format:Y-m-d H:i:s',
                'actual_qty' => 'required|numeric|min:0',
                'item_id' => 'required|exists:items,id',
                'branch_id' => 'required|exists:branches,id',
                'open_by' => 'required|exists:users,id',
                'close_by' => 'required|exists:users,id',
                'stock_opname_id' => 'required|exists:stock_opname_branches,id',
            ]);

            // Get Item stock
            $item = $this->getBranchItemRepository->getBranchItem($request->branch_id, $request->item_id);
            $system_stok = $item->stok_branch;

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

            $newStockOpnameBranchDetailDTO = new NewStockOpnameBranchDetailDTO(
                $request->so_start,
                $request->so_end,
                $request->actual_qty,
                $system_stok,
                $diff_qty,
                $positive_diff_qty,
                $negative_diff_qty,
                $adjustment_type,
                $request->item_id,
                $request->branch_id,
                $request->open_by,
                $request->close_by,
                $request->stock_opname_id,
            );

            $stockOpnameBranchDetail = $this->addStockOpnameBranchDetailRepository->addStockOpnameBranchDetail($newStockOpnameBranchDetailDTO);

            return $stockOpnameBranchDetail;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

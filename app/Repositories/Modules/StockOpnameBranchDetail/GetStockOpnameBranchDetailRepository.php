<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\StockOpnameBranchDetailInfoDTO;

use App\Models\Modules\StockOpnameBranchDetail;

class GetStockOpnameBranchDetailRepository {
    /**
     * Get Stock Opname Branch Detail
     * @param int $stockOpnameBranchId
     * @return StockOpnameBranchDetailInfoDTO
     */
    public function getStockOpnameBranchDetail(int $stockOpnameBranchId) {
        try {
            $stockOpnameBranchDetailInfo = StockOpnameBranchDetail::whereRaw('stock_opname_branch_details.id = ' . $stockOpnameBranchId)
                ->join('branches', 'stock_opname_branch_details.branch_id', '=', 'branches.id')
                ->join('items', 'stock_opname_branch_details.item_id', '=', 'items.id')
                ->join('users as open_by', 'stock_opname_branch_details.open_by', '=', 'open_by.id')
                ->join('users as close_by', 'stock_opname_branch_details.close_by', '=', 'close_by.id')
                ->leftJoin('users as adjustment_by', 'stock_opname_branch_details.adjustment_by', '=', 'adjustment_by.id')
                ->select(
                    'stock_opname_branch_details.*',
                    'items.kode_item as kode_item',
                    'items.jenis_item as jenis_item',
                    'open_by.employee_name as open_by_name',
                    'close_by.employee_name as close_by_name',
                    'adjustment_by.employee_name as adjustment_by_name',
                    'branches.nama_branch as nama_branch'
                )
                ->first();


            $so_start = date_create($stockOpnameBranchDetailInfo->so_start);
            $so_end = date_create($stockOpnameBranchDetailInfo->so_end);
            $so_duration = date_diff($so_start, $so_end)->format('%H:%I:%S');

            $stockOpnameBranchDetailInfoDTO = new StockOpnameBranchDetailInfoDTO(
                $stockOpnameBranchDetailInfo->id,
                $stockOpnameBranchDetailInfo->stock_opname_id,
                $stockOpnameBranchDetailInfo->so_start,
                $stockOpnameBranchDetailInfo->so_end,
                $so_duration,
                $stockOpnameBranchDetailInfo->actual_qty,
                $stockOpnameBranchDetailInfo->system_qty,
                $stockOpnameBranchDetailInfo->diff_qty,
                $stockOpnameBranchDetailInfo->positive_diff_qty,
                $stockOpnameBranchDetailInfo->negative_diff_qty,
                $stockOpnameBranchDetailInfo->adjustment_type,
                $stockOpnameBranchDetailInfo->adjustment_status,
                $stockOpnameBranchDetailInfo->adjustment_date,
                $stockOpnameBranchDetailInfo->adjustment_followup_note,
                $stockOpnameBranchDetailInfo->adjustment_by,
                $stockOpnameBranchDetailInfo->adjustment_by_name,
                $stockOpnameBranchDetailInfo->branch_id,
                $stockOpnameBranchDetailInfo->nama_branch,
                $stockOpnameBranchDetailInfo->item_id,
                $stockOpnameBranchDetailInfo->kode_item,
                $stockOpnameBranchDetailInfo->jenis_item,
                $stockOpnameBranchDetailInfo->open_by,
                $stockOpnameBranchDetailInfo->open_by_name,
                $stockOpnameBranchDetailInfo->close_by,
                $stockOpnameBranchDetailInfo->close_by_name
            );

            return $stockOpnameBranchDetailInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>

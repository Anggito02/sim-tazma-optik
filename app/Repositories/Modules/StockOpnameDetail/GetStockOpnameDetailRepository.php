<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;

use App\Models\Modules\StockOpnameDetail;

class GetStockOpnameDetailRepository {
    /**
     * Get Stock Opname Detail
     * @param int $stockOpnameId
     * @return StockOpnameDetailInfoDTO
     */
    public function getStockOpnameDetail(int $stockOpnameId) {
        try {
            $stockOpnameDetailInfo = StockOpnameDetail::whereRaw('stock_opname_details.id = ' . $stockOpnameId)
                ->join('items', 'stock_opname_details.item_id', '=', 'items.id')
                ->join('users as open_by', 'stock_opname_details.open_by', '=', 'open_by.id')
                ->join('users as close_by', 'stock_opname_details.close_by', '=', 'close_by.id')
                ->leftJoin('users as adjustment_by', 'stock_opname_details.adjustment_by', '=', 'adjustment_by.id')
                ->select(
                    'stock_opname_details.*',
                    'items.kode_item as kode_item',
                    'items.jenis_item as jenis_item',
                    'open_by.employee_name as open_by_name',
                    'close_by.employee_name as close_by_name',
                    'adjustment_by.employee_name as adjustment_by_name',
                )
                ->first();


            $so_start = date_create($stockOpnameDetailInfo->so_start);
            $so_end = date_create($stockOpnameDetailInfo->so_end);
            $so_duration = date_diff($so_start, $so_end)->format('%H:%I:%S');

            $stockOpnameDetailInfoDTO = new StockOpnameDetailInfoDTO(
                $stockOpnameDetailInfo->id,
                $stockOpnameDetailInfo->stock_opname_id,
                $stockOpnameDetailInfo->so_start,
                $stockOpnameDetailInfo->so_end,
                $so_duration,
                $stockOpnameDetailInfo->actual_qty,
                $stockOpnameDetailInfo->system_qty,
                $stockOpnameDetailInfo->diff_qty,
                $stockOpnameDetailInfo->positive_diff_qty,
                $stockOpnameDetailInfo->negative_diff_qty,
                $stockOpnameDetailInfo->adjustment_type,
                $stockOpnameDetailInfo->adjustment_status,
                $stockOpnameDetailInfo->adjustment_date,
                $stockOpnameDetailInfo->adjustment_followup_note,
                $stockOpnameDetailInfo->adjustment_by,
                $stockOpnameDetailInfo->adjustment_by_name,
                $stockOpnameDetailInfo->item_id,
                $stockOpnameDetailInfo->kode_item,
                $stockOpnameDetailInfo->jenis_item,
                $stockOpnameDetailInfo->open_by,
                $stockOpnameDetailInfo->open_by_name,
                $stockOpnameDetailInfo->close_by,
                $stockOpnameDetailInfo->close_by_name,
            );

            return $stockOpnameDetailInfoDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>

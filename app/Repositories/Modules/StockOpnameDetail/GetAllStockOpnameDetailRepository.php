<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Support\Facades\DB;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;

use App\Models\Modules\StockOpnameDetail;

class GetAllStockOpnameDetailRepository {
    /**
     * Get all Stock Opname Detail
     * @param int $page
     * @param int $limit
     * @param int $stockOpnameId
     */
    public function getAllStockOpnameDetail(int $page, int $limit, int $stockOpnameId) {
        try {
            $stockOpnameDetailInfoRaw = StockOpnameDetail::where('stock_opname_id', $stockOpnameId)
                ->join('items', 'stock_opname_details.item_id', '=', 'items.id')
                ->join('users as open_by', 'stock_opname_details.open_by', '=', 'open_by.id')
                ->join('users as close_by', 'stock_opname_details.close_by', '=', 'close_by.id')
                ->join('users as adjustment_by', 'stock_opname_details.adjustment_by', '=', 'adjustment_by.id')
                ->select(
                    'stock_opname_details.id as id',
                    'stock_opname_details.so_start as so_start',
                    'stock_opname_details.so_end as so_end',
                    'stock_opname_details.actual_qty as actual_qty',
                    'stock_opname_details.system_qty as system_qty',
                    'stock_opname_details.diff_qty as diff_qty',
                    'stock_opname_details.positive_diff_qty as positive_diff_qty',
                    'stock_opname_details.negative_diff_qty as negative_diff_qty',
                    'stock_opname_details.adjustment_status as adjustment_status',
                    'stock_opname_details.adjustment_type as adjustment_type',
                    'stock_opname_details.adjustment_date as adjustment_date',
                    'stock_opname_details.adjustment_followup_note as adjustment_followup_note',
                    'stock_opname_details.item_id as item_id',
                    'stock_opname_details.open_by as open_by',
                    'stock_opname_details.close_by as close_by',
                    'stock_opname_details.adjustment_by as adjustment_by',
                    'stock_opname_details.stock_opname_id as stock_opname_id',
                    'items.kode_item as kode_item',
                    'items.jenis_item as jenis_item',
                    'open_by.employee_name as open_by_name',
                    'close_by.employee_name as close_by_name',
                    'adjustment_by.employee_name as adjustment_by_name',
                )
                ->paginate($limit, ['*'], 'page', $page);

            $stockOpnameDetailInfoDTOs = [];

            foreach ($stockOpnameDetailInfoRaw as $stockOpnameDetailInfo) {
                $so_start = date_create($stockOpnameDetailInfo->so_start);
                $so_end = date_create($stockOpnameDetailInfo->so_end);
                $so_duration = date_diff($so_start, $so_end)->format('%H:%I:%S');

                $stockOpnameDetailInfoDTO = new StockOpnameDetailInfoDTO(
                    $stockOpnameDetailInfo->id,
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

                array_push($stockOpnameDetailInfoDTOs, $stockOpnameDetailInfoDTO);
            }

            return $stockOpnameDetailInfoDTOs;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>

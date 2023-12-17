<?php

namespace App\Repositories\Modules\StockOpnameDetail;

use Exception;

use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailInfoDTO;
use App\DTO\Modules\StockOpnameDetailDTOs\StockOpnameDetailFilterDTO;

use App\Models\Modules\StockOpnameDetail;

class GetAllStockOpnameDetailRepository {
    /**
     * Get all Stock Opname Detail
     * @param int $page
     * @param int $limit
     * @param int $stockOpnameId
     */
    public function getAllStockOpnameDetail(StockOpnameDetailFilterDTO $SODetailFilterDTO) {
        try {

            $activeFilter = [];

            $stock_opname_id_sql = $SODetailFilterDTO->getStockOpnameId() ? "stock_opname_id = " . $SODetailFilterDTO->getStockOpnameId() : null;
            array_push($activeFilter, $stock_opname_id_sql);

            $so_start_sql = null;
            if (!$SODetailFilterDTO->getTanggalSoUntil()) {
                $so_start_sql = "so_start >= '" . $SODetailFilterDTO->getTanggalSoFrom() . "'";
            } elseif ($SODetailFilterDTO->getTanggalSoUntil()) {
                $so_start_sql = "so_start BETWEEN '" . $SODetailFilterDTO->getTanggalSoFrom() . "' AND '" . $SODetailFilterDTO->getTanggalSoUntil() . "'";
            }
            array_push($activeFilter, $so_start_sql);

            $adjustment_type_sql = $SODetailFilterDTO->getAdjustmentType() ? "adjustment_type LIKE '%" . $SODetailFilterDTO->getAdjustmentType() . "%'" : null;
            array_push($activeFilter, $adjustment_type_sql);

            $adjustment_date_sql = null;
            if (!$SODetailFilterDTO->getAdjustmentDateUntil() && $SODetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date >= '" . $SODetailFilterDTO->getAdjustmentDateFrom() . "'";
            } elseif ($SODetailFilterDTO->getAdjustmentDateUntil() && $SODetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date BETWEEN '" . $SODetailFilterDTO->getAdjustmentDateFrom() . "' AND '" . $SODetailFilterDTO->getAdjustmentDateUntil() . "'";
            } elseif ($SODetailFilterDTO->getAdjustmentDateUntil() && !$SODetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date <= '" . $SODetailFilterDTO->getAdjustmentDateUntil() . "'";
            }
            array_push($activeFilter, $adjustment_date_sql);

            $adjustment_status_sql = $SODetailFilterDTO->getAdjustmentStatus() ? "adjustment_status LIKE '%" . $SODetailFilterDTO->getAdjustmentStatus() . "%'" : null;
            array_push($activeFilter, $adjustment_status_sql);

            $jenis_item_sql = $SODetailFilterDTO->getJenisItem() ? "items.jenis_item LIKE '%" . $SODetailFilterDTO->getJenisItem() . "%'" : null;
            array_push($activeFilter, $jenis_item_sql);

            $open_by_sql = $SODetailFilterDTO->getOpenBy() ? "open_by.id = ". $SODetailFilterDTO->getOpenBy() : null;
            array_push($activeFilter, $open_by_sql);

            $close_by_sql = $SODetailFilterDTO->getClosedBy() ? "close_by.id = ". $SODetailFilterDTO->getClosedBy() : null;
            array_push($activeFilter, $close_by_sql);

            $adjustment_by_sql = $SODetailFilterDTO->getAdjustmentBy() ? "adjustment_by.id = ". $SODetailFilterDTO->getAdjustmentBy() : null;
            array_push($activeFilter, $adjustment_by_sql);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter !== null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            $stockOpnameDetailInfoRaw = StockOpnameDetail::whereRaw($activeFilter)
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
                ->paginate($SODetailFilterDTO->getLimit(), ['*'], 'page', $SODetailFilterDTO->getPage());

            $stockOpnameDetailInfoDTOs = [];

            foreach ($stockOpnameDetailInfoRaw as $stockOpnameDetailInfo) {
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

                array_push($stockOpnameDetailInfoDTOs, $stockOpnameDetailInfoDTO);
            }

            return $stockOpnameDetailInfoDTOs;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>

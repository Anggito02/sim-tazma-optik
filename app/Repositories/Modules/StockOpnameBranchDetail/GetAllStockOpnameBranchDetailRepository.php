<?php

namespace App\Repositories\Modules\StockOpnameBranchDetail;

use Exception;

use App\DTO\Modules\StockOpnameBranchDetailDTOs\StockOpnameBranchDetailInfoDTO;
use App\DTO\Modules\StockOpnameBranchDetailDTOs\StockOpnameBranchDetailFilterDTO;


use App\Models\Modules\StockOpnameBranchDetail;

class GetAllStockOpnameBranchDetailRepository
{
    /**
     * Get All Stock Opname Branch Detail
     * @param StockOpnameBranchDetailFilterDTO $SOBranchDetailFilterDTO
     * @return StockOpnameBranchDetailInfoDTO[]
     */
    public function getAllStockOpnameBranchDetail(StockOpnameBranchDetailFilterDTO $SOBranchDetailFilterDTO) {
        try {
            $activeFilter = [];

            $stock_opname_branch_id_sql = $SOBranchDetailFilterDTO->getStockOpnameBranchId() ? "stock_opname_id = " . $SOBranchDetailFilterDTO->getStockOpnameBranchId() : null;
            array_push($activeFilter, $stock_opname_branch_id_sql);

            $so_start_sql = null;
            if (!$SOBranchDetailFilterDTO->getTanggalSoUntil()) {
                $so_start_sql = "so_start >= '" . $SOBranchDetailFilterDTO->getTanggalSoFrom() . "'";
            } elseif ($SOBranchDetailFilterDTO->getTanggalSoUntil()) {
                $so_start_sql = "so_start BETWEEN '" . $SOBranchDetailFilterDTO->getTanggalSoFrom() . "' AND '" . $SOBranchDetailFilterDTO->getTanggalSoUntil() . "'";
            }
            array_push($activeFilter, $so_start_sql);

            $adjustment_type_sql = $SOBranchDetailFilterDTO->getAdjustmentType() ? "adjustment_type LIKE '%" . $SOBranchDetailFilterDTO->getAdjustmentType() . "%'" : null;
            array_push($activeFilter, $adjustment_type_sql);

            $adjustment_date_sql = null;
            if (!$SOBranchDetailFilterDTO->getAdjustmentDateUntil() && $SOBranchDetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date >= '" . $SOBranchDetailFilterDTO->getAdjustmentDateFrom() . "'";
            } elseif ($SOBranchDetailFilterDTO->getAdjustmentDateUntil() && $SOBranchDetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date BETWEEN '" . $SOBranchDetailFilterDTO->getAdjustmentDateFrom() . "' AND '" . $SOBranchDetailFilterDTO->getAdjustmentDateUntil() . "'";
            } elseif ($SOBranchDetailFilterDTO->getAdjustmentDateUntil() && !$SOBranchDetailFilterDTO->getAdjustmentDateFrom()) {
                $adjustment_date_sql = "adjustment_date <= '" . $SOBranchDetailFilterDTO->getAdjustmentDateUntil() . "'";
            }
            array_push($activeFilter, $adjustment_date_sql);

            $adjustment_status_sql = $SOBranchDetailFilterDTO->getAdjustmentStatus() ? "adjustment_status LIKE '%" . $SOBranchDetailFilterDTO->getAdjustmentStatus() . "%'" : null;
            array_push($activeFilter, $adjustment_status_sql);

            $jenis_item_sql = $SOBranchDetailFilterDTO->getJenisItem() ? "items.jenis_item LIKE '%" . $SOBranchDetailFilterDTO->getJenisItem() . "%'" : null;
            array_push($activeFilter, $jenis_item_sql);

            $open_by_sql = $SOBranchDetailFilterDTO->getOpenBy() ? "open_by.id = ". $SOBranchDetailFilterDTO->getOpenBy() : null;
            array_push($activeFilter, $open_by_sql);

            $close_by_sql = $SOBranchDetailFilterDTO->getClosedBy() ? "close_by.id = ". $SOBranchDetailFilterDTO->getClosedBy() : null;
            array_push($activeFilter, $close_by_sql);

            $adjustment_by_sql = $SOBranchDetailFilterDTO->getAdjustmentBy() ? "adjustment_by.id = ". $SOBranchDetailFilterDTO->getAdjustmentBy() : null;
            array_push($activeFilter, $adjustment_by_sql);

            $activeFilter = array_filter($activeFilter, function ($filter) {
                return $filter !== null;
            });

            $activeFilter = implode(' AND ', $activeFilter);

            $stockOpnameDetailInfoRaw = StockOpnameBranchDetail::whereRaw($activeFilter)
                ->join('branches', 'stock_opname_branch_details.branch_id', '=', 'branches.id')
                ->join('items', 'stock_opname_branch_details.item_id', '=', 'items.id')
                ->join('users as open_by', 'stock_opname_branch_details.open_by', '=', 'open_by.id')
                ->join('users as close_by', 'stock_opname_branch_details.close_by', '=', 'close_by.id')
                ->leftJoin('users as adjustment_by', 'stock_opname_branch_details.adjustment_by', '=', 'adjustment_by.id')
                ->select(
                    'stock_opname_branch_details.*',
                    'branches.nama_branch',
                    'items.kode_item as kode_item',
                    'items.jenis_item as jenis_item',
                    'open_by.employee_name as open_by_name',
                    'close_by.employee_name as close_by_name',
                    'adjustment_by.employee_name as adjustment_by_name'
                )
                ->paginate($SOBranchDetailFilterDTO->getLimit(), ['*'], 'page', $SOBranchDetailFilterDTO->getPage());

            $SOBranchDetailInfoDTOs = [];

            foreach ($stockOpnameDetailInfoRaw as $stockOpnameDetailInfo) {
                $so_start = date_create($stockOpnameDetailInfo->so_start);
                $so_end = date_create($stockOpnameDetailInfo->so_end);
                $so_duration = date_diff($so_start, $so_end)->format('%H:%I:%S');

                $stockOpnameDetailInfoDTO = new StockOpnameBranchDetailInfoDTO(
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
                    $stockOpnameDetailInfo->branch_id,
                    $stockOpnameDetailInfo->nama_branch,
                    $stockOpnameDetailInfo->item_id,
                    $stockOpnameDetailInfo->kode_item,
                    $stockOpnameDetailInfo->jenis_item,
                    $stockOpnameDetailInfo->open_by,
                    $stockOpnameDetailInfo->open_by_name,
                    $stockOpnameDetailInfo->close_by,
                    $stockOpnameDetailInfo->close_by_name,
                );

                array_push($SOBranchDetailInfoDTOs, $stockOpnameDetailInfoDTO);
            }

            return $SOBranchDetailInfoDTOs;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

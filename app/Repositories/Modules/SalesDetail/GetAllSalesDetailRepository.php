<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

use App\DTO\Modules\SalesDetailDTOs\SalesDetailInfoDTO;

class GetAllSalesDetailRepository {
    /**
     * Get All Sales Detail
     * @param int $page
     * @param int $limit
     * @param int $sales_master_id
     * @return SalesDetailInfoDTO[]
     */
    public function getAllSalesDetail(int $page, int $limit, int $sales_master_id) {
        try {
            $salesDetails = SalesDetail::where('sales_master_id', $sales_master_id)
                ->join('branch_items', 'sales_details.branch_item_id', '=', 'branch_items.id')
                ->join('items', 'branch_items.item_id', '=', 'items.id')
                ->select(
                    'sales_details.id',
                    'items.kode_item',
                    'sales_details.harga',
                    'sales_details.qty',
                    'sales_details.sales_master_id',
                    'sales_details.po_detail_id',
                    'sales_details.coa_id',
                    'branch_items.id as branch_item_id',
                    'items.diskon as diskon'
                )
                ->paginate($limit, ['*'], 'page', $page);

            $salesDetailInfoDTOs = [];

            foreach ($salesDetails as $salesDetail) {
                $salesDetailInfoDTO = new SalesDetailInfoDTO(
                    $salesDetail->id,
                    $salesDetail->kode_item,
                    $salesDetail->harga,
                    $salesDetail->qty,
                    $salesDetail->sales_master_id,
                    $salesDetail->branch_item_id,
                    $salesDetail->po_detail_id,
                    $salesDetail->coa_id,
                    $salesDetail->diskon
                );

                array_push($salesDetailInfoDTOs, $salesDetailInfoDTO);
            }

            return $salesDetailInfoDTOs;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

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

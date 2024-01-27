<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

use App\DTO\Modules\SalesDetailDTOs\SalesDetailInfoDTO;

class GetSalesDetailRepository
{
    /**
     * Get sales detail
     * @param int $id
     * @return SalesDetailInfoDTO
     */
    public function getSalesDetail(int $id) {
        try {
            $sales_detail = SalesDetail::where('sales_details.id', $id)
                ->join('branch_items', 'sales_details.branch_item_id', '=', 'branch_items.id')
                ->join('items', 'branch_items.item_id', '=', 'items.id')
                ->select(
                    'sales_details.*',
                    'items.kode_item',
                )
                ->first();

            $salesDetailDTO = new SalesDetailInfoDTO(
                $sales_detail->id,
                $sales_detail->kode_item,
                $sales_detail->diskon,
                $sales_detail->harga,
                $sales_detail->potongan_manual,
                $sales_detail->qty,
                $sales_detail->sales_master_id,
                $sales_detail->branch_item_id,
                $sales_detail->po_detail_id,
                $sales_detail->coa_id
            );

            return $salesDetailDTO;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>

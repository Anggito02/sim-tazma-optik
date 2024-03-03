<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

use App\DTO\Modules\SalesDetailDTOs\NewSalesDetailDTO;

class AddSalesDetailRepository {
    /**
     * Add Sales Detail
     * @param NewSalesDetailDTO $newSalesDetailDTO
     * @return SalesDetail
     */
    public function addSalesDetail(NewSalesDetailDTO $newSalesDetailDTO) {
        try {
            $salesDetail = new SalesDetail();

            $salesDetail->kode_item = $newSalesDetailDTO->getKodeItem();
            $salesDetail->harga = $newSalesDetailDTO->getHarga();
            $salesDetail->diskon = $newSalesDetailDTO->getDiskon();

            $salesDetail->sales_master_id = $newSalesDetailDTO->getSalesMasterId();
            $salesDetail->branch_item_id = $newSalesDetailDTO->getBranchItemId();
            $salesDetail->po_detail_id = $newSalesDetailDTO->getPoDetailId();
            $salesDetail->coa_id = $newSalesDetailDTO->getCoaId();

            $salesDetail->save();

            return $salesDetail;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>

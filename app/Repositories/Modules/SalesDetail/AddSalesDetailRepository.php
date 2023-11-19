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
            $salesDetail->qty = $newSalesDetailDTO->getQty();

            $salesDetail->sales_master_id = $newSalesDetailDTO->getSalesMasterId();
            $salesDetail->item_id = $newSalesDetailDTO->getItemId();
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

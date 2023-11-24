<?php

namespace App\Repositories\Modules\SalesDetail;

use Exception;

use App\Models\Modules\SalesDetail;

use App\DTO\Modules\SalesDetailDTOs\EditSalesDetailDTO;

class EditSalesDetailRepository {
    /**
     * Edit Sales Detail
     * @param int $id
     * @param EditSalesDetailDTO $editSalesDetailDTO
     * @return SalesDetail
     */
    public function editSalesDetail(int $id, EditSalesDetailDTO $editSalesDetailDTO) {
        try {
            $salesDetail = SalesDetail::find($id);

            $salesDetail->qty = $editSalesDetailDTO->getQty();

            $salesDetail->save();

            return $salesDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

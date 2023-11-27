<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\DeleteSalesDetailRepository;
use App\Repositories\Modules\SalesDetail\GetSalesDetailQtyRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

class DeleteSalesDetailService {
    public function __construct(
        private DeleteSalesDetailRepository $deleteSalesDetailRepository,
        private GetSalesDetailQtyRepository $getSalesDetailQtyRepository,
        private UpdateTotalHargaProcedureRepository $updateTotalHargaProcedureRepository,
    )
    {}

    /**
     * Delete Sales Detail
     * @param Request $request
     * @return SalesDetail
     */
    public function deleteSalesDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:sales_details,id',
                'sales_master_id' => 'required|exists:sales_masters,id',
                'harga' => 'required|integer',
            ]);

            // Get sales detail qty
            $salesDetailQty = $this->getSalesDetailQtyRepository->getSalesDetailQty($request->id);

            $jumlah_perubahan = $salesDetailQty * $request->harga;

            // Update total harga
            $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $jumlah_perubahan, 'pengurangan');

            $salesDetail = $this->deleteSalesDetailRepository->deleteSalesDetail($request->id);

            return $salesDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

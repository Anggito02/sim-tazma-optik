<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\DeleteSalesDetailRepository;
use App\Repositories\Modules\SalesDetail\GetSalesDetailRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

class DeleteSalesDetailService {
    public function __construct(
        private DeleteSalesDetailRepository $deleteSalesDetailRepository,
        private GetSalesDetailRepository $getSalesDetailRepository,
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
            ]);

            // Get sales detail info
            $salesDetail = $this->getSalesDetailRepository->getSalesDetail($request->id);

            $salesDetailQty = $salesDetail->getQty();
            $salesDetailHarga = $salesDetail->getHarga();

            $jumlah_perubahan = $salesDetailQty * $salesDetailHarga;

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

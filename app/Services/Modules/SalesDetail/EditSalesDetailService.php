<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesDetailDTOs\EditSalesDetailDTO;

use App\Repositories\Modules\SalesDetail\EditSalesDetailRepository;
use App\Repositories\Modules\SalesDetail\GetSalesDetailRepository;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

class EditSalesDetailService {
    public function __construct(
        private EditSalesDetailRepository $editSalesDetailRepository,
        private GetSalesDetailRepository $getSalesDetailRepository,
        private GetBranchItemRepository $getBranchItemRepository,
        private GetItemRepository $getItemRepository,
        private UpdateTotalHargaProcedureRepository $updateTotalHargaProcedureRepository,
    )
    {}

    /**
     * Edit Sales Detail
     * @param Request $request
     * @return SalesDetail
     */
    public function editSalesDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:sales_details,id',
                'sales_master_id' => 'required|exists:sales_masters,id',
                'qty' => 'required|integer',
                'potongan_manual' => 'integer|gte:0'
            ]);

            // Get sales detail info
            $salesDetail = $this->getSalesDetailRepository->getSalesDetail($request->id);

            $salesDetailQty = $salesDetail->getQty();
            $salesDetailHarga = $salesDetail->getHarga();

            $selisihQty = abs($request->qty - $salesDetailQty);

            $jumlah_perubahan = $selisihQty * $salesDetailHarga;
            $tipe_perubahan = '';
            if ($request->qty > $salesDetailQty) {
                $tipe_perubahan = 'penambahan';
            } else {
                $tipe_perubahan = 'pengurangan';
            }

            // Update total harga for qty changes
            $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $jumlah_perubahan, $tipe_perubahan);

            // Calculate the Potongan Manual
            // Get Potongan Manual before
            $potongan_manual_before = $salesDetail->getPotonganManual();

            $selisih = $request->potongan_manual - $potongan_manual_before;

            if ($selisih > 0) {
                $tipe_perubahan = 'pengurangan';
            } else if ($selisih < 0) {
                $selisih = $selisih * -1;
                $tipe_perubahan = 'penambahan';
            }

            // Update total harga for qty changes
            $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $selisih, $tipe_perubahan);

            $editSalesDetailDTO = new EditSalesDetailDTO(
                $request->id,
                $request->qty,
                $request->potongan_manual
            );

            $salesDetail = $this->editSalesDetailRepository->editSalesDetail($request->id, $editSalesDetailDTO);

            return $salesDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

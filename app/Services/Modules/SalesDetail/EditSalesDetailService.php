<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\SalesDetailDTOs\EditSalesDetailDTO;

use App\Repositories\Modules\SalesDetail\EditSalesDetailRepository;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\SalesDetail\GetSalesDetailQtyRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

class EditSalesDetailService {
    public function __construct(
        private EditSalesDetailRepository $editSalesDetailRepository,
        private GetBranchItemRepository $getBranchItemRepository,
        private GetItemRepository $getItemRepository,
        private GetSalesDetailQtyRepository $getSalesDetailQtyRepository,
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
                'harga_item' => 'required|integer',
            ]);

            // Sales detail current qty
            $salesDetailQty = $this->getSalesDetailQtyRepository->getSalesDetailQty($request->id);

            $selisihQty = abs($request->qty - $salesDetailQty);

            $jumlah_perubahan = $selisihQty * $request->harga_item;
            $tipe_perubahan = '';
            if ($request->qty > $salesDetailQty) {
                $tipe_perubahan = 'penambahan';
            } else {
                $tipe_perubahan = 'pengurangan';
            }

            // Update total harga
            $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $jumlah_perubahan, $tipe_perubahan);

            $editSalesDetailDTO = new EditSalesDetailDTO(
                $request->id,
                $request->qty,
            );

            $salesDetail = $this->editSalesDetailRepository->editSalesDetail($request->id, $editSalesDetailDTO);

            return $salesDetail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

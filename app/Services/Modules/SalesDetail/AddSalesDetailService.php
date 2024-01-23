<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\AddSalesDetailRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Services\Coa\AddCoaService;
use App\Services\Modules\SalesDetail\EditSalesDetailService;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;
use App\Repositories\Modules\SalesDetail\CheckSalesDetailExistence;
use App\Repositories\Modules\SalesDetail\GetSalesDetailRepository;

use App\DTO\Modules\SalesDetailDTOs\NewSalesDetailDTO;

class AddSalesDetailService {
    public function __construct(
        private AddSalesDetailRepository $addSalesDetailRepository,

        private AddCoaService $addCoaService,
        private UpdateBranchStokService $branchItemService,
        private EditSalesDetailService $editSalesDetailService,
        private GetBranchItemRepository $getBranchItemRepository,
        private GetItemRepository $getItemRepository,
        private UpdateTotalHargaProcedureRepository $updateTotalHargaProcedureRepository,
        private CheckSalesDetailExistence $checkSalesDetailExistence,
        private GetSalesDetailRepository $getSalesDetailRepository
    )
    {}

    /**
     * Add Sales Detail
     * @param Request $request
     * @return SalesDetail
     */
    public function addSalesDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'sales_master_id' => 'required|exists:sales_masters,id',
                'branch_id' => 'required|exists:branches,id',
                'kode_qr_po_detail' => 'required|exists:purchase_order_details,kode_qr_po_detail'
            ]);

            // Get QR details
            $qr_details = explode("-", substr($request->kode_qr_po_detail, 3));
            $item_id = $qr_details[0];
            $po_detail_id = $qr_details[1];

            // Get branch item
            $branchItemId = $this->getBranchItemRepository->getBranchItem($request->branch_id, $item_id)->getId();

            // Check sales detail existence
            $sales_detail_id = $this->checkSalesDetailExistence->checkSalesDetail($request->sales_master_id, $branchItemId, $po_detail_id);

            $salesDetailDTO = null;
            if ($sales_detail_id != 0) {
                // Get sales detail
                $salesDetail = $this->getSalesDetailRepository->getSalesDetail($sales_detail_id);

                $salesDetailDTO = $this->editSalesDetailService->editSalesDetail(new Request([
                    'id' => $sales_detail_id,
                    'sales_master_id' => $request->sales_master_id,
                    'qty' => $salesDetail->getQty() + 1,
                    'harga_item' => $salesDetail->getHarga()
                ]));
            } else {
                // Get item harga and kode_item
                $item = $this->getItemRepository->getItem($item_id);

                $kode_item = $item->getKodeItem();
                $harga_item = $item->getHargaJual();
                $diskon = $item->getDiskon();

                // Update total harga
                $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $harga_item, 'penambahan');

                $newSalesDetailDTO = new NewSalesDetailDTO(
                    $kode_item,
                    $harga_item,
                    $diskon,
                    $request->sales_master_id,
                    $branchItemId,
                    $po_detail_id,
                    1,
                );

                $salesDetailDTO = $this->addSalesDetailRepository->addSalesDetail($newSalesDetailDTO);
            }

            return $salesDetailDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

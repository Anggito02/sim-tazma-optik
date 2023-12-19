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
                'kode_item' => 'required|string',
                'sales_master_id' => 'required|exists:sales_masters,id',
                'item_id' => 'required|exists:branch_items,id',
                'branch_id' => 'required|exists:branches,id',
                'po_detail_id' => 'required|exists:purchase_order_details,id',
            ]);

            // Get branch item
            $branchItemId = $this->getBranchItemRepository->getBranchItem($request->branch_id, $request->item_id)->getId();

            // Check sales detail existence
            $sales_detail_id = $this->checkSalesDetailExistence->checkSalesDetail($request->sales_master_id, $branchItemId, $request->po_detail_id);

            $salesDetailDTO = null;
            if ($sales_detail_id != 0) {
                // Get sales detail
                $salesDetail = $this->getSalesDetailRepository->getSalesDetail($sales_detail_id);

                $salesDetailDTO = $this->editSalesDetailService->editSalesDetail(new Request([
                    'id' => $sales_detail_id,
                    'sales_master_id' => $request->sales_master_id,
                    'qty' => $salesDetail->qty + 1,
                    'harga_item' => $salesDetail->harga
                ]));
            } else {
                // Get item harga
                $item = $this->getItemRepository->getItem($request->item_id);

                $harga_item = $item->getHargaJual();

                // Update total harga
                $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $harga_item, 'penambahan');

                $newSalesDetailDTO = new NewSalesDetailDTO(
                    $request->kode_item,
                    $harga_item,
                    $request->sales_master_id,
                    $branchItemId,
                    $request->po_detail_id,
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

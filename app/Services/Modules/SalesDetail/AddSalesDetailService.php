<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\AddSalesDetailRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Services\Coa\AddCoaService;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\SalesMaster\UpdateTotalHargaProcedureRepository;

use App\DTO\Modules\SalesDetailDTOs\NewSalesDetailDTO;

class AddSalesDetailService {
    public function __construct(
        private AddSalesDetailRepository $addSalesDetailRepository,

        private AddCoaService $addCoaService,
        private UpdateBranchStokService $branchItemService,
        private GetBranchItemRepository $getBranchItemRepository,
        private GetItemRepository $getItemRepository,
        private UpdateTotalHargaProcedureRepository $updateTotalHargaProcedureRepository,
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
            $branchItem = $this->getBranchItemRepository->getBranchItem($request->branch_id, $request->item_id);

            // Get item harga
            $item = $this->getItemRepository->getItem($request->item_id);

            $harga_item = $item->getHargaJual();

            // Update total harga
            $this->updateTotalHargaProcedureRepository->updateTotalHargaProcedure($request->sales_master_id, $harga_item, 'penambahan');

            $newSalesDetailDTO = new NewSalesDetailDTO(
                $request->kode_item,
                $harga_item,
                $request->sales_master_id,
                $branchItem->getId(),
                $request->po_detail_id,
                1,
            );

            $salesDetailDTO = $this->addSalesDetailRepository->addSalesDetail($newSalesDetailDTO);

            return $salesDetailDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\AddSalesDetailRepository;

use App\Services\Modules\BranchItem\UpdateBranchStokService;
use App\Repositories\Modules\BranchItem\GetBranchItemRepository;

use App\DTO\Modules\SalesDetailDTOs\NewSalesDetailDTO;

class AddSalesDetailService {
    public function __construct(
        private AddSalesDetailRepository $addSalesDetailRepository,

        private UpdateBranchStokService $branchItemRepository,
        private GetBranchItemRepository $getBranchItemRepository,
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
                'harga' => 'required',
                'qty' => 'required|integer',
                'sales_master_id' => 'required|exists:sales_masters,id',
                'item_id' => 'required|exists:branch_items,id',
                'branch_id' => 'required|exists:branches,id',
                'po_detail_id' => 'required|exists:purchase_order_details,id',
                'coa_id' => 'required|exists:coas,id',
            ]);

            // Update item stock in branch
            $this->branchItemRepository->updateBranchStok(new Request([
                'item_id' => $request->item_id,
                'branch_id' => $request->branch_id,
                'jumlah_perubahan' => $request->qty,
                'jenis_perubahan' => 'pengurangan',
            ]));

            // Get branch item
            $branchItem = $this->getBranchItemRepository->getBranchItem($request->item_id, $request->branch_id);

            $newSalesDetailDTO = new NewSalesDetailDTO(
                $request->kode_item,
                $request->harga,
                $request->qty,
                $request->sales_master_id,
                $branchItem->getId(),
                $request->po_detail_id,
                $request->coa_id,
            );

            $salesDetailDTO = $this->addSalesDetailRepository->addSalesDetail($newSalesDetailDTO);

            return $salesDetailDTO;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

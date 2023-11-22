<?php

namespace App\Services\Modules\SalesDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\SalesDetail\AddSalesDetailRepository;

use App\DTO\Modules\SalesDetailDTOs\NewSalesDetailDTO;

class AddSalesDetailService {
    public function __construct(
        private AddSalesDetailRepository $addSalesDetailRepository,
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
                'item_id' => 'required|exists:items,id',
                'po_detail_id' => 'required|exists:purchase_order_details,id',
                'coa_id' => 'required|exists:coas,id',
            ]);

            // TODO: Update item stock

            $newSalesDetailDTO = new NewSalesDetailDTO(
                $request->kode_item,
                $request->harga,
                $request->qty,
                $request->sales_master_id,
                $request->item_id,
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

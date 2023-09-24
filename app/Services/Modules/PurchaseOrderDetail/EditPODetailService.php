<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\EditPODetailRepository;

class EditPODetailService {
    public function __construct(
        private EditPODetailRepository $poDetailRepository
    ) {}

    /**
     * Edit Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function editPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:purchase_order_details,id',
                'received_qty' => 'required|gte:0',
                'not_good_qty' => 'required|gte:0',
                'unit' => 'required',
                'harga_beli_satuan' => 'required|gte:0',
                'harga_jual_satuan' => 'required|gte:0',
                'diskon' => 'required|gte:0',
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'item_id' => 'required|exists:items,id',
            ]);

            $poDetailDTO = new PurchaseOrderDetailDTO(
                $request->id,
                $request->received_qty,
                $request->not_good_qty,
                $request->unit,
                $request->harga_beli_satuan,
                $request->harga_jual_satuan,
                $request->diskon,
                $request->purchase_order_id,
                $request->item_id
            );

            $poDetailDTO = $this->poDetailRepository->editPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

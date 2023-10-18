<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\EditPODetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\ReceiveOrder\GetReceiveOrderRepository;

use App\Repositories\Modules\Item\PriceLogProcedureRepository;
use App\Repositories\Modules\Item\StockLogProcedureRepository;
use App\Repositories\Modules\Item\StockIn\CheckStockInRepository;
use App\Repositories\Modules\Item\StockIn\AddStockInProcedureRepository;
use App\Repositories\Modules\Item\StockIn\UpdateStockInProcedureRepository;

class EditPODetailService {
    public function __construct(
        private EditPODetailRepository $poDetailRepository,
        private GetItemRepository $getItemRepository,
        private GetReceiveOrderRepository $receiveOrderRepository,

        private PriceLogProcedureRepository $priceLogProcedureRepository,
        private StockLogProcedureRepository $stockLogProcedureRepository,
        private CheckStockInRepository $checkStockInRepository,
        private AddStockInProcedureRepository $addStockInProcedureRepository,
        private UpdateStockInProcedureRepository $updateStockInProcedureRepository,

    ) {}

    /**
     * Edit Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function editPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            // NOTES : CAN ONLY EDIT RECEIVE QTY AND NOT GOOD QTY
            $request->validate([
                'id' => 'required|exists:purchase_order_details,id',
                'pre_order_qty' => 'gte:0',
                'received_qty' => 'lte:pre_order_qty',
                'not_good_qty' => 'lte:pre_order_qty',
                'item_id' => 'exists:items,id',

                // Foreign Key
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'receive_order_id' => 'nullable|exists:receive_orders,id',
            ]);

            $poDetailDTO = new PurchaseOrderDetailDTO(
                $request->id,
                $request->pre_order_qty,
                $request->received_qty,
                $request->not_good_qty,
                $request->unit,
                $request->harga_beli_satuan,
                $request->harga_jual_satuan,
                $request->diskon,
                $request->purchase_order_id,
                $request->receive_order_id,
                $request->item_id
            );

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // Get RO
            $receiveOrderDTO = $this->receiveOrderRepository->getReceiveOrder($request->receive_order_id);

            // update stok log
            $this->stockLogProcedureRepository->stockLogProcedure(
                date('Y-m-d H:i:s'),
                $itemDTO->stok,
                $itemDTO->stok + $request->received_qty,
                'penambahan',
                $request->item_id,
                $request->receive_order_id
            );

            if ($this->checkStockInRepository->checkStockInExistence($itemDTO->id, date('m'), date('Y'))) {
                // update stok in
                $this->updateStockInProcedureRepository->updateStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->received_qty,
                    $request->item_id,
                    $request->purchase_order_id,
                    $request->receive_order_id,
                    $receiveOrderDTO->checked_by,
                    $receiveOrderDTO->approved_by
                );
            } else {
                // make new row in stok in
                $this->addStockInProcedureRepository->addStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->received_qty,
                    $request->item_id,
                    $request->purchase_order_id,
                    $request->receive_order_id,
                    $receiveOrderDTO->checked_by,
                    $receiveOrderDTO->approved_by
                );
            }

            $poDetailDTO = $this->poDetailRepository->editPurchaseOrderDetail($poDetailDTO);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
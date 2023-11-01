<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetail\UpdateStockPODetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\UpdateStockPODetailRepository;
use App\Repositories\Modules\Item\GetItemRepository;
use App\Repositories\Modules\Item\EditItemRepository;
use App\Repositories\Modules\ReceiveOrder\GetReceiveOrderRepository;

use App\Repositories\Modules\Item\StockLogProcedureRepository;
use App\Repositories\Modules\Item\StockIn\CheckStockInRepository;
use App\Repositories\Modules\Item\StockIn\AddStockInProcedureRepository;
use App\Repositories\Modules\Item\StockIn\UpdateStockInProcedureRepository;

class UpdateStockPODetailService {
    public function __construct(
        private UpdateStockPODetailRepository $poDetailRepository,
        private GetItemRepository $getItemRepository,
        private EditItemRepository $editItemRepository,
        private GetReceiveOrderRepository $receiveOrderRepository,

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
                'pre_order_qty' => 'required|gte:0',
                'received_qty' => 'required|lte:pre_order_qty',
                'not_good_qty' => 'required|lte:pre_order_qty',
                'item_id' => 'required|exists:items,id',

                // Foreign Key
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'receive_order_id' => 'nullable|exists:receive_orders,id',
            ]);

            $poDetailDTO = new UpdateStockPODetailDTO(
                $request->id,
                $request->received_qty,
                $request->not_good_qty,
                $request->item_id,
                $request->purchase_order_id,
                $request->receive_order_id,
            );

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($request->item_id);

            // update stok log
            $this->stockLogProcedureRepository->stockLogProcedure(
                date('Y-m-d H:i:s'),
                $itemDTO->stok,
                $itemDTO->stok + $request->received_qty,
                $request->received_qty,
                'penambahan',
                $request->item_id,
                $request->receive_order_id,
                null
            );

            // update item stock
            $itemDTO->stok += $request->received_qty;
            $itemDTO = $this->editItemRepository->editItem($itemDTO);

            if ($this->checkStockInRepository->checkStockInExistence($itemDTO->id, date('m'), date('Y'))) {
                // update stok in
                $this->updateStockInProcedureRepository->updateStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->received_qty,
                    $request->item_id
                );
            } else {
                // make new row in stok in
                $this->addStockInProcedureRepository->addStockInProcedure(
                    $itemDTO->kode_item,
                    date('m'),
                    date('Y'),
                    $request->received_qty,
                    $request->item_id
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

<?php

namespace App\Services\Modules\StockOpnameDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDetailDTOs\AdjustInfoSODetailDTO;

use App\Services\Modules\PurchaseOrder\AddPOService;
use App\Services\Modules\PurchaseOrderDetail\AddPODetailService;
use App\Services\Modules\PurchaseOrderDetail\UpdateStockPODetailService;
use App\Services\Modules\ReceiveOrder\AddReceiveOrderService;

use App\Repositories\Modules\Item\GetItemRepository;

class AdjustInSODetailService {
    public function __construct(
        private AddPOService $addPOService,
        private AddPODetailService $addPODetailService,
        private UpdateStockPODetailService $updateStockPODetailService,
        private AddReceiveOrderService $addReceiveOrderService,

        private GetItemRepository $getItemRepository,
    )
    {}

    /**
     * Make Adjustment Stock Opname Detail
     * @param AdjustInfoSODetailDTO $adjustInfoSODetailDTO
     * @return AdjustStockOpnameDetailRepository
     */
    public function makeAdjustmentSODetail(AdjustInfoSODetailDTO $adjustInfoSODetailDTO) {
        try {
            $adjustment_by = $adjustInfoSODetailDTO->adjustment_by;
            $item_id = $adjustInfoSODetailDTO->item_id;
            $in_out_qty = $adjustInfoSODetailDTO->in_out_qty;

            // Get Item
            $itemDTO = $this->getItemRepository->getItem($item_id);

            // Create PO
            $poDTO = $this->addPOService->addPurchaseOrder(new Request([
                'status_po' => FALSE,
                'status_penerimaan' => TRUE,
                'status_pembayaran' => TRUE,

                // Foreign Keys
                'vendor_id' => 1,
                'made_by' => $adjustment_by,
                'checked_by' => $adjustment_by,
                'approved_by' => $adjustment_by,
            ]));

            // Create Receive Order
            $roDTO = $this->addReceiveOrderService->addReceiveOrder(new Request([
                'purchase_order_id' => $poDTO->id,
                'received_by' => $adjustment_by,
                'checked_by' => $adjustment_by,
                'approved_by' => $adjustment_by,
            ]));

            // Create PO Detail
            $poDetailDTO = $this->addPODetailService->addPurchaseOrderDetail(new Request([
                'pre_order_qty' => $in_out_qty,
                'unit' => 'buah',
                'harga_beli_satuan' => $itemDTO->harga_beli,
                'harga_jual_satuan' => $itemDTO->harga_jual,
                'diskon' => $itemDTO->diskon,
                'item_id' => $item_id,
                'purchase_order_id' => $poDTO->id,
            ]));

            // Update stock at PO Detail
            $updateStok = $this->updateStockPODetailService->editPurchaseOrderDetail(new Request([
                'id' => $poDetailDTO->id,
                'pre_order_qty' => $in_out_qty,
                'received_qty' => $in_out_qty,
                'not_good_qty' => 0,
                'item_id' => $item_id,
                'purchase_order_id' => $poDTO->id,
                'receive_order_id' => $roDTO->id,
            ]));

            return [
                'poDTO' => $poDTO,
                'roDTO' => $roDTO,
                'poDetailDTO' => $poDetailDTO,
                'updateStok' => $updateStok,
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

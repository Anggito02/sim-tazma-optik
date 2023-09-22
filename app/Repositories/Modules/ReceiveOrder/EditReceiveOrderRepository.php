<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class EditReceiveOrderRepository {
    /**
     * Edit Receive Order
     * @param ReceiveOrderDTO $receiveOrderDTO
     * @return ReceiveOrderDTO
     */
    public function editReceiveOrder(ReceiveOrderDTO $receiveOrderDTO) {
        try {
            $receiveOrder = ReceiveOrder::find($receiveOrderDTO->id);
            $receiveOrder->receive_qty = $receiveOrderDTO->getReceiveQty();
            $receiveOrder->not_good_qty = $receiveOrderDTO->getNotGoodQty();
            $receiveOrder->tanggal_penerimaan = $receiveOrderDTO->getTanggalPenerimaan();
            $receiveOrder->status_invoice = $receiveOrderDTO->getStatusInvoice();

            $receiveOrder->purchase_order_id = $receiveOrderDTO->getPurchaseOrderId();

            $receiveOrder->received_by = $receiveOrderDTO->getReceivedBy();
            $receiveOrder->checked_by = $receiveOrderDTO->getCheckedBy();
            $receiveOrder->approved_by = $receiveOrderDTO->getApprovedBy();
            $receiveOrder->save();

            return $receiveOrder;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

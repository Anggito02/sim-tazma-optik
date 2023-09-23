<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class AddReceiveOrderRepository {
    /**
     * Add Receive Order
     * @param ReceiveOrderDTO $receiveOrderDTO
     * @return ReceiveOrderDTO
     */
    public function addReceiveOrder(ReceiveOrderDTO $receiveOrderDTO) {
        try {
            $newReceiveOrder = new ReceiveOrder();
            $newReceiveOrder->nomor_receive_order = $receiveOrderDTO->getNomorReceiveOrder();
            $newReceiveOrder->tanggal_penerimaan = $receiveOrderDTO->getTanggalPenerimaan();

            $newReceiveOrder->purchase_order_id = $receiveOrderDTO->getPurchaseOrderId();

            $newReceiveOrder->received_by = $receiveOrderDTO->getReceivedBy();
            $newReceiveOrder->checked_by = $receiveOrderDTO->getCheckedBy();
            $newReceiveOrder->approved_by = $receiveOrderDTO->getApprovedBy();
            $newReceiveOrder->save();

            return $newReceiveOrder;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

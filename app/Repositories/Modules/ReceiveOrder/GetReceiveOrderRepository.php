<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class GetReceiveOrderRepository {
    /**
     * Get Receive Order
     * @param int $po_id
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrder(int $po_id) {
        try {
            $receiveOrder = ReceiveOrder::where('purchase_order_id', $po_id)->first();

            $receiveOrderDTO = new ReceiveOrderDTO(
                $receiveOrder->id,
                $receiveOrder->nomor_receive_order,
                $receiveOrder->tanggal_penerimaan,

                $receiveOrder->purchase_order_id,

                $receiveOrder->received_by,
                $receiveOrder->checked_by,
                $receiveOrder->approved_by,
            );

            return $receiveOrderDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class GetReceiveOrderRepository {
    /**
     * Get Receive Order
     * @param int $id
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrder(int $id) {
        try {
            $receiveOrder = ReceiveOrder::find($id);

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

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

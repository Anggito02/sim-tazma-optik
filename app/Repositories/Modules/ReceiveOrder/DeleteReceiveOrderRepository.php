<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class DeleteReceiveOrderRepository {
    /**
     * Delete Receive Order
     * @param int $id
     * @return ReceiveOrderDTO
     */
    public function deleteReceiveOrder(int $id) {
        try {
            $receiveOrder = ReceiveOrder::find($id);
            $receiveOrder->delete();

            return $receiveOrder;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

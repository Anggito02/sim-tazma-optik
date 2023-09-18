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

            return $receiveOrder;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

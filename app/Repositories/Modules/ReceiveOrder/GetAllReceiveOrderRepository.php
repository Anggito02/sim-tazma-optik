<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;
use App\Models\Modules\ReceiveOrder;

class GetAllReceiveOrderRepository {
    /**
     * Get All Receive Order
     * @param int $page
     * @param int $limit
     * @return ReceiveOrderDTO
     */
    public function getAllReceiveOrder(int $page, int $limit) {
        try {
            // use pagination
            $receiveOrders = ReceiveOrder::paginate($limit, ['*'], 'page', $page);

            $receiveOrderDTOs = [];
            foreach ($receiveOrders as $receiveOrder) {
                $receiveOrderDTO = new ReceiveOrderDTO(
                    $receiveOrder->id,
                    $receiveOrder->nomor_receive_order,
                    $receiveOrder->tanggal_penerimaan,

                    $receiveOrder->purchase_order_id,

                    $receiveOrder->received_by,
                    $receiveOrder->checked_by,
                    $receiveOrder->approved_by,
                );

                array_push($receiveOrderDTOs, $receiveOrderDTO);
            }

            return $receiveOrderDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

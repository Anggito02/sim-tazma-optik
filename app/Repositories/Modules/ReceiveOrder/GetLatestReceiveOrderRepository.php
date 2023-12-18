<?php

namespace App\Repositories\Modules\ReceiveOrder;

use Exception;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Models\Modules\ReceiveOrder;

class GetLatestReceiveOrderRepository {
    /**
     * Get latest RO
     * @return ReceiveOrderDTO
     */
    public function getLatestRO() {
        try {
            $ro = ReceiveOrder::latest()->first();

            if (!$ro) {
                return null;
            }

            $roDTO = new ReceiveOrderDTO(
                $ro->id,
                $ro->nomor_receive_order,
                $ro->tanggal_penerimaan,

                // Foreign Keys
                // Purchase Order
                $ro->purchase_order_id,

                // Employee
                $ro->received_by,
                $ro->checked_by,
                $ro->approved_by,
            );

            return $roDTO;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

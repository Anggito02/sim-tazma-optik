<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\AddReceiveOrderRepository;

class AddReceiveOrderService {
    /**
     * Add Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function addReceiveOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nomor_receive_order' => 'required',
                'receive_qty' => 'required',
                'not_good_qty' => 'required',
                'tanggal_penerimaan' => 'required',
                'status_invoice' => 'required',
                'purchase_order_id' => 'required',
                'received_by' => 'required',
                'checked_by' => 'required',
                'approved_by' => 'required'
            ]);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

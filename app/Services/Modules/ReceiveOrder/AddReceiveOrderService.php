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
                'nomor_receive_order' => 'required|unique:receive_orders,nomor_receive_order',
                'receive_qty' => 'required|gt:0',
                'not_good_qty' => 'required|gt:0',
                'tanggal_penerimaan' => 'required',
                'status_invoice' => 'required',
                'purchase_order_id' => 'required',
                'received_by' => 'required',
                'checked_by' => 'required',
                'approved_by' => 'required'
            ]);

            $receiveOrderDTO = new ReceiveOrderDTO(
                null,
                $request->nomor_receive_order,
                $request->receive_qty,
                $request->not_good_qty,
                $request->tanggal_penerimaan,
                $request->status_invoice,
                $request->purchase_order_id,
                $request->received_by,
                $request->checked_by,
                $request->approved_by
            );

            $receiveOrderDTO = (new AddReceiveOrderRepository)->addReceiveOrder($receiveOrderDTO);

            return $receiveOrderDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

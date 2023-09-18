<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\EditReceiveOrderRepository;

class EditReceiveOrderService {
    public function __construct(
        private EditReceiveOrderRepository $receiveOrderRepository
    ) {}

    /**
     * Edit Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function editReceiveOrder(Request $request) {
        try {
            // Validate Request
            $request->validate([
                'id' => 'required|exists:receive_orders,id',
                'nomor_receive_order' => 'required',
                'receive_qty' => 'required',
                'not_good_qty' => 'required',
                'tanggal_penerimaan' => 'required',
                'status_invoice' => 'required',

                // Foreign Keys
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'received_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
            ]);

            $receiveOrderDTO = new ReceiveOrderDTO(
                $request->id,
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

            $receiveOrderDTO = $this->receiveOrderRepository->editReceiveOrder($receiveOrderDTO);

            return $receiveOrderDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

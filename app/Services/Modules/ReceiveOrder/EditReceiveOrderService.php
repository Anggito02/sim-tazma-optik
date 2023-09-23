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

                // Foreign Keys
                'received_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
            ]);

            $receiveOrderDTO = new ReceiveOrderDTO(
                $request->id,
                null,
                null,
                null,
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

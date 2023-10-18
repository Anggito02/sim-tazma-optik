<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\GetReceiveOrderRepository;

class GetReceiveOrderService {
    public function __construct(
        private GetReceiveOrderRepository $receiveOrderRepository
    ) {}

    /**
     * Get Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'po_id' => 'required',
            ]);

            $id = $request->id;

            $receiveOrderDTO = $this->receiveOrderRepository->getReceiveOrder($id);

            return $receiveOrderDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\GetAllReceiveOrderRepository;

class GetAllReceiveOrderService {
    public function __construct(
        private GetAllReceiveOrderRepository $receiveOrderRepository
    ) {}

    /**
     * Get All Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getAllReceiveOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $receiveOrderDTO = $this->receiveOrderRepository->getAllReceiveOrder($request->page, $request->limit);

            return $receiveOrderDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

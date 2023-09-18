<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\DeleteReceiveOrderRepository;

class DeleteReceiveOrderService {
    public function __construct(
        private DeleteReceiveOrderRepository $receiveOrderRepository
    ) {}

    /**
     * Delete Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function deleteReceiveOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $receiveOrderDTO = $this->receiveOrderRepository->deleteReceiveOrder($id);

            return $receiveOrderDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

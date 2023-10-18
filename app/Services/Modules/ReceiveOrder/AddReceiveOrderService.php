<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\AddReceiveOrderRepository;

use App\Services\Modules\ReceiveOrder\GenerateReceiveOrderNumberService;

class AddReceiveOrderService {
    public function __construct(
        private AddReceiveOrderRepository $receiveOrderRepository,

        private GenerateReceiveOrderNumberService $generateReceiveOrderNumberService
    ) {}

    /**
     * Add Receive Order
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function addReceiveOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'purchase_order_id' => 'required',
                'received_by' => 'required',
                'checked_by' => 'required',
                'approved_by' => 'required'
            ]);

            // Auto numbering RO
            $nomor_receive_order = $this->generateReceiveOrderNumberService->generateReceiveOrderNumber();

            // Get current datetime
            $tanggal_penerimaan = date('Y-m-d H:i:s');

            $receiveOrderDTO = new ReceiveOrderDTO(
                null,
                $nomor_receive_order,
                $tanggal_penerimaan,
                $request->purchase_order_id,
                $request->received_by,
                $request->checked_by,
                $request->approved_by
            );

            $receiveOrderDTO = $this->receiveOrderRepository->addReceiveOrder($receiveOrderDTO);

            return $receiveOrderDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

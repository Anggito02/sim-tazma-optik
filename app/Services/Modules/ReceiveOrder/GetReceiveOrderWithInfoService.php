<?php

namespace App\Services\Modules\ReceiveOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReceiveOrderDTO;

use App\Repositories\Modules\ReceiveOrder\GetReceiveOrderWithInfoRepository;

class GetReceiveOrderWithInfoService {
    public function __construct(
        private GetReceiveOrderWithInfoRepository $receiveOrderRepository
    ) {}

    /**
     * Get Receive Order with info
     * @param Request $request
     * @return ReceiveOrderDTO
     */
    public function getReceiveOrderWithInfo(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $receiveOrderDTO = $this->receiveOrderRepository->getReceiveOrderWithInfo($id);

            return $receiveOrderDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

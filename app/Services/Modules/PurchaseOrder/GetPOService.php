<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTOs\POInfoDTO;

use App\Repositories\Modules\PurchaseOrder\GetPORepository;

class GetPOService {
    public function __construct(
        private GetPORepository $poRepository
    ) {}

    /**
     * Get Purchase Order
     * @param Request $request
     * @return POInfoDTO
     */
    public function getPurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDTO = $this->poRepository->getPurchaseOrder($id);

            $poArray = $poDTO->toArray();

            return $poArray;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

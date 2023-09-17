<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\GetPORepository;

class GetPOService {
    public function __construct(
        private GetPORepository $poRepository
    ) {}

    /**
     * Get Purchase Order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getPurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDTO = $this->poRepository->getPurchaseOrder($id);

            return $poDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\GetAllPORepository;

class GetAllPOService {
    public function __construct(
        private GetAllPORepository $poRepository
    ) {}

    /**
     * Get all Purchase Order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getAllPurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $poDTO = $this->poRepository->getAllPurchaseOrder($request->page, $request->limit);

            return $poDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

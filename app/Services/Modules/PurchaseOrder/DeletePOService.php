<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\PurchaseOrder\DeletePORepository;

class DeletePOService {
    public function __construct(
        private DeletePORepository $poRepository
    ) {}

    /**
     * Delete Purchase Order
     * @param Request $request
     * @return PurchaseOrder
     */
    public function deletePurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDTO = $this->poRepository->deletePurchaseOrder($id);

            return $poDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

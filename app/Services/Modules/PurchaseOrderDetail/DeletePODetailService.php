<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetail\PurchaseOrderDetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\DeletePODetailRepository;

class DeletePODetailService {
    public function __construct(
        private DeletePODetailRepository $poDetailRepository
    ) {}

    /**
     * Delete Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function deletePurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDetailDTO = $this->poDetailRepository->deletePurchaseOrderDetail($id);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

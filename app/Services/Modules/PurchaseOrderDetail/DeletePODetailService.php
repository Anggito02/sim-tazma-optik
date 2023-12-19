<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Repositories\Modules\PurchaseOrderDetail\DeletePODetailRepository;
use App\Services\Modules\PurchaseOrderDetail\GetPODetailService;

class DeletePODetailService {
    public function __construct(
        private DeletePODetailRepository $poDetailRepository,
        private GetPODetailService $getPODetailService
    ) {}

    /**
     * Delete Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetail
     */
    public function deletePurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            // Delete Purchase Order Detail QR
            $poDetailQrPath = $this->getPODetailService->getPurchaseOrderDetail($id);

            Storage::delete($poDetailQrPath);

            $poDetailDTO = $this->poDetailRepository->deletePurchaseOrderDetail($id);

            return $poDetailDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\Modules\PurchaseOrderDetail\GetPODetailRepository;

class GetPODetailQRService {
    public function __construct(
        private GetPODetailRepository $poDetailRepository
    ) {}

    /**
     * Get Purchase Order Detail QR
     * @param Request $request
     * @return Image
     */
    public function getPurchaseOrderDetailQR(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:purchase_order_details,id',
            ]);

            $id = $request->id;

            $poDetailDTO = $this->poDetailRepository->getPurchaseOrderDetail($id);

            $poDetailQRPath = $poDetailDTO->getQrItemPath();

            $poDetailQRImage = Storage::get($poDetailQRPath);

            return $poDetailQRImage;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

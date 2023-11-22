<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Modules\PurchaseOrderDetail\GetAllPODetailRepository;

class GetAllPODetailService {
    public function __construct(
        private GetAllPODetailRepository $poDetailRepository
    ) {}

    /**
     * Get all Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailInfoDTO[]
     */
    public function getAllPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'page' => 'required',
                'limit' => 'required',
            ]);

            $poDetailDTOs = $this->poDetailRepository->getAllPurchaseOrderDetail($request->page, $request->limit, $request->purchase_order_id);

            $poDetailArrays = [];

            foreach ($poDetailDTOs as $poDetailDTO) {
                array_push($poDetailArrays, $poDetailDTO->toArray());
            }

            return $poDetailArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

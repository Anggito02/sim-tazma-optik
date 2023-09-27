<?php

namespace App\Services\Modules\PurchaseOrderDetail;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDetailDTO;

use App\Repositories\Modules\PurchaseOrderDetail\GetAllPODetailRepository;

class GetAllPODetailService {
    public function __construct(
        private GetAllPODetailRepository $poDetailRepository
    ) {}

    /**
     * Get all Purchase Order Detail
     * @param Request $request
     * @return PurchaseOrderDetailDTO
     */
    public function getAllPurchaseOrderDetail(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $poDetailDTO = $this->poDetailRepository->getAllPurchaseOrderDetail($request->page, $request->limit);

            return $poDetailDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

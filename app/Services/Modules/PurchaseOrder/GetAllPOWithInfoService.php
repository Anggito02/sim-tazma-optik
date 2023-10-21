<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\GetAllPOWithInfoRepository;

class GetAllPOWithInfoService {
    public function __construct(
        private GetAllPOWithInfoRepository $poRepository
    ) {}

    /**
     * Get all Purchase Order with info
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getAllPurchaseOrderWithInfo(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $poDTO = $this->poRepository->getAllPurchaseOrderWithInfo($request->page, $request->limit);

            return $poDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

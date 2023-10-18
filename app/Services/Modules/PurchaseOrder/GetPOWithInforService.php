<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\GetPOWithInfoRepository;

class GetPOWithInfoService {
    public function __construct(
        private GetPOWithInfoRepository $poRepository
    ) {}

    /**
     * Get Purchase Order with info
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function getPurchaseOrderWithInfo(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $id = $request->id;

            $poDTO = $this->poRepository->getPurchaseOrderWithInfo($id);

            return $poDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

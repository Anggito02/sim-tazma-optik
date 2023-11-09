<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\EditPOStatusPenerimaanRepository;

class EditPOStatusPenerimaanService {
    public function __construct(
        private EditPOStatusPenerimaanRepository $poRepository
    ) {}

    /**
     * Edit Purchase Order Status Penerimaan
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function editPurchaseOrderStatusPenerimaan(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'status_penerimaan' => 'required',
            ]);

            $id = $request->id;
            $status_penerimaan = $request->status_penerimaan;

            $poDTO = $this->poRepository->editPurchaseOrderStatusPenerimaan($id, $status_penerimaan);

            return $poDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

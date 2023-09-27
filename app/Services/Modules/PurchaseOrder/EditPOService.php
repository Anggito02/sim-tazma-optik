<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTO;

use App\Repositories\Modules\PurchaseOrder\EditPORepository;

class EditPOService {
    public function __construct(
        private EditPORepository $poRepository
    ) {}

    /**
     * Edit Purchase Order
     * @param Request $request
     * @return PurchaseOrderDTO
     */
    public function editPurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'status_po' => 'required',
                'status_penerimaan' => 'required',
                'status_pembayaran' => 'required',

                // Foreign Keys
                'vendor_id' => 'required|exists:vendors,id',
                'made_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
            ]);

            $poDTO = new PurchaseOrderDTO(
                $request->id,
                null,
                null,
                $request->status_po,
                $request->status_penerimaan,
                $request->status_pembayaran,
                $request->vendor_id,
                $request->made_by,
                $request->checked_by,
                $request->approved_by,
            );

            $poDTO = $this->poRepository->editPurchaseOrder($poDTO);

            return $poDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

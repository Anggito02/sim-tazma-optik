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
                'qty' => 'required',
                'unit' => 'required',
                'harga_beli_satuan' => 'required',
                'harga_jual_satuan' => 'required',
                'diskon' => 'required',
                'status_po' => 'required',
                'status_penerimaan' => 'required',
                'status_pembayaran' => 'required',

                // Foreign Keys
                'vendor_id' => 'required|exists:vendors,id',
                'item_id' => 'required|exists:items,id',
                'made_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
            ]);

            $poDTO = new PurchaseOrderDTO(
                $request->id,
                null,
                $request->qty,
                $request->unit,
                $request->harga_beli_satuan,
                $request->harga_jual_satuan,
                $request->diskon,
                $request->status_po,
                $request->status_penerimaan,
                $request->status_pembayaran,
                $request->vendor_id,
                $request->item_id,
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

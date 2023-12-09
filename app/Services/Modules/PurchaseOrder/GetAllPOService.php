<?php

namespace App\Services\Modules\PurchaseOrder;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\PurchaseOrderDTOs\POFilterDTO;
use App\DTO\Modules\PurchaseOrderDTOs\POInfoDTO;

use App\Repositories\Modules\PurchaseOrder\GetAllPORepository;

class GetAllPOService {
    public function __construct(
        private GetAllPORepository $poRepository
    ) {}

    /**
     * Get all Purchase Order
     * @param Request $request
     * @return POInfoDTO
     */
    public function getAllPurchaseOrder(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
                'bulan' => 'nullable|integer|between:1,12',
                'tahun' => 'nullable|integer',
                'status_po' => 'nullable|boolean',
                'status_penerimaan' => 'nullable|boolean',
                'status_pembayaran' => 'nullable|boolean',
                'vendor_id' => 'nullable|exists:vendors,id',
                'made_by' => 'nullable|exists:users,id',
                'checked_by' => 'nullable|exists:users,id',
                'approved_by' => 'nullable|exists:users,id',
            ]);

            $poFilter = new POFilterDTO(
                $request->page,
                $request->limit,
                $request->bulan,
                $request->tahun,
                $request->status_po,
                $request->status_penerimaan,
                $request->status_pembayaran,
                $request->vendor_id,
                $request->made_by,
                $request->checked_by,
                $request->approved_by
            );

            $poDTO = $this->poRepository->getAllPurchaseOrder($poFilter);

            $poArrays = [];

            foreach ($poDTO as $po) {
                array_push($poArrays, $po->toArray());
            }

            return $poArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

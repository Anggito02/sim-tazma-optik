<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\VendorInvoiceDTO;

use App\Repositories\Modules\VendorInvoice\DeleteVendorInvoiceRepository;

class DeleteVendorInvoiceService {
    public function __construct(
        private DeleteVendorInvoiceRepository $vendorInvoiceRepository
    ) {}

    /**
     * Delete Vendor Invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function deleteVendorInvoice(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
            ]);

            $vendorInvoiceDTO = $this->vendorInvoiceRepository->deleteVendorInvoice($request->id);

            return $vendorInvoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

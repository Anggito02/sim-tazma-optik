<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\VendorInvoiceDTOs\VendorInvoiceInfoDTO;

use App\Repositories\Modules\VendorInvoice\GetVendorInvoiceRepository;

class GetVendorInvoiceService {
    public function __construct(
        private GetVendorInvoiceRepository $vendorInvoiceRepository
    ) {}

    /**
     * Get Vendor Invoice
     * @param Request $request
     * @return VendorInvoiceInfoDTO
     */
    public function getVendorInvoice(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'exists:vendor_invoices,id|required',
            ]);

            $id = $request->id;

            $vendorInvoiceDTO = $this->vendorInvoiceRepository->getVendorInvoice($id);

            return $vendorInvoiceDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

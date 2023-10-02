<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\VendorInvoiceDTO;

use App\Repositories\Modules\VendorInvoice\GetAllVendorInvoiceRepository;

class GetAllVendorInvoiceService {
    public function __construct(
        private GetAllVendorInvoiceRepository $vendorInvoiceRepository
    ) {}

    /**
     * Get all Vendor Invoice
     * @param Request $request
     * @return VendorInvoiceDTO
     */
    public function getAllVendorInvoice(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $vendorInvoiceDTO = $this->vendorInvoiceRepository->getAllVendorInvoice($request->page, $request->limit);

            return $vendorInvoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

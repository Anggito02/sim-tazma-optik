<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;

use App\Repositories\Vendor\GetVendorRepository;
use App\Repositories\Modules\VendorInvoice\GetLatestVendorInvoiceRepository;

class GenerateInvoiceNumberService {
    public function __construct(
        private GetVendorRepository $getVendorInvoiceRepository,
        private GetLatestVendorInvoiceRepository $getLatestVendorInvoiceRepository
    ) {}

    /**
     * Generate Invoice Number
     * @param int $id
     * @return string
     */

    public function generateInvoiceNumber(int $vendor_id) {
        try {
            // Get Latest Vendor Invoice
            $latestVendorInvoice = $this->getLatestVendorInvoiceRepository->getLatestVendorInvoice($vendor_id, date('m'), date('Y'));

            $invoiceNumber = 0;
            if ($latestVendorInvoice == null) {
                $invoiceNumber = 1;
            } else {
                // Split and get number
                $invoiceNumber = explode('/', $latestVendorInvoice->nomor_invoice_vendor)[3]++;
            }

            // Get kode vendor
            $vendor = $this->getVendorInvoiceRepository->getVendor($vendor_id);

            return $vendor->kode_vendor . '/' . date('m') . '/' . date('Y') . '/' . $invoiceNumber;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

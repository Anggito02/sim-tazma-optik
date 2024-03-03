<?php

namespace App\Repositories\Modules\VendorInvoice;

use App\Models\Modules\VendorInvoice;
use Exception;

class GetLatestVendorInvoiceRepository {
    /**
     * Get Latest Vendor Invoice
     * @param int $vendor_id
     * @param int $month
     * @param int $year
     * @return VendorInvoiceDTO
     */
    public function getLatestVendorInvoice(int $vendor_id, int $month, int $year) {
        try {
            $vendorInvoice = VendorInvoice::where('vendor_id', $vendor_id)
                ->whereMonth('updated_at', $month)
                ->whereYear('updated_at', $year)
                ->latest()
                ->first();

            return $vendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

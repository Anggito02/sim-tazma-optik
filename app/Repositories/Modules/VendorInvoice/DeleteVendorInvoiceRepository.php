<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class DeleteVendorInvoiceRepository {
    /**
     * Delete Vendor Invoice
     * @param int $id
     * @return VendorInvoiceDTO
     */
    public function deleteVendorInvoice(int $id) {
        try {
            $vendorInvoice = VendorInvoice::find($id);
            $vendorInvoice->delete();

            return $vendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

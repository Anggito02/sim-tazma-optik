<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTOs\UpdateVendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class EditVendorInvoiceRepository {
    /**
     * Edit Vendor Invoice
     * @param UpdateVendorInvoiceDTO $vendorInvoiceDTO
     * @return UpdateVendorInvoiceDTO
     */
    public function editVendorInvoice(UpdateVendorInvoiceDTO $vendorInvoiceDTO) {
        try {
            $vendorInvoice = VendorInvoice::find($vendorInvoiceDTO->id);
            $vendorInvoice->status_pembayaran_1 = $vendorInvoiceDTO->getStatusPembayaran1();
            $vendorInvoice->status_pembayaran_2 = $vendorInvoiceDTO->getStatusPembayaran2();
            $vendorInvoice->status_pembayaran_3 = $vendorInvoiceDTO->getStatusPembayaran3();
            $vendorInvoice->status_pembayaran_4 = $vendorInvoiceDTO->getStatusPembayaran4();
            $vendorInvoice->status_pembayaran = $vendorInvoiceDTO->getStatusPembayaranKeseluruhan();

            $vendorInvoice->save();

            return $vendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

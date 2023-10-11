<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class GetVendorInvoiceRepository {
    /**
     * Get Vendor Invoice
     * @param int $id
     * @return VendorInvoiceDTO
     */
    public function getVendorInvoice(int $id) {
        try {
            $vendorInvoice = VendorInvoice::find($id);

            $vendorInvoiceDTO = new VendorInvoiceDTO(
                $vendorInvoice->id,
                $vendorInvoice->nomor_invoice_vendor,
                $vendorInvoice->nomor_invoice_receive,
                $vendorInvoice->iterasi_pembayaran,
                $vendorInvoice->bukti_pembayaran_1,
                $vendorInvoice->status_pembayaran_1,
                $vendorInvoice->bukti_pembayaran_2,
                $vendorInvoice->status_pembayaran_2,
                $vendorInvoice->bukti_pembayaran_3,
                $vendorInvoice->status_pembayaran_3,
                $vendorInvoice->bukti_pembayaran_4,
                $vendorInvoice->status_pembayaran_4,
                $vendorInvoice->status_pembayaran,

                // Foreign Key
                // Vendor
                $vendorInvoice->vendor_id,

                // Purchase Order
                $vendorInvoice->purchase_order_id,

                // Receive Order
                $vendorInvoice->receive_order_id,

                // Employee
                $vendorInvoice->accepted_by,
                $vendorInvoice->checked_by,
                $vendorInvoice->approved_by,
            );

            return $vendorInvoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

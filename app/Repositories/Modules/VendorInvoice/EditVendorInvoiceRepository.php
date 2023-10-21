<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class EditVendorInvoiceRepository {
    /**
     * Edit Vendor Invoice
     * @param VendorInvoiceDTO $vendorInvoiceDTO
     * @return VendorInvoiceDTO
     */
    public function editVendorInvoice(VendorInvoiceDTO $vendorInvoiceDTO) {
        try {
            $vendorInvoice = VendorInvoice::find($vendorInvoiceDTO->id);
            $vendorInvoice->nomor_invoice_vendor = $vendorInvoiceDTO->getNomorInvoiceVendor();
            $vendorInvoice->nomor_invoice_receive = $vendorInvoiceDTO->getNomorInvoiceReceive();
            $vendorInvoice->iterasi_pembayaran = $vendorInvoiceDTO->getIterasiPembayaran();
            $vendorInvoice->bukti_pembayaran_1 = $vendorInvoiceDTO->getBuktiPembayaran1();
            $vendorInvoice->status_pembayaran_1 = $vendorInvoiceDTO->getStatusPembayaran1();
            $vendorInvoice->bukti_pembayaran_2 = $vendorInvoiceDTO->getBuktiPembayaran2();
            $vendorInvoice->status_pembayaran_2 = $vendorInvoiceDTO->getStatusPembayaran2();
            $vendorInvoice->bukti_pembayaran_3 = $vendorInvoiceDTO->getBuktiPembayaran3();
            $vendorInvoice->status_pembayaran_3 = $vendorInvoiceDTO->getStatusPembayaran3();
            $vendorInvoice->bukti_pembayaran_4 = $vendorInvoiceDTO->getBuktiPembayaran4();
            $vendorInvoice->status_pembayaran_4 = $vendorInvoiceDTO->getStatusPembayaran4();
            $vendorInvoice->status_pembayaran = $vendorInvoiceDTO->getStatusPembayaran();

            // Foreign Key
            // Vendor
            $vendorInvoice->vendor_id = $vendorInvoiceDTO->getVendorId();

            // Purchase Order
            $vendorInvoice->purchase_order_id = $vendorInvoiceDTO->getPurchaseOrderId();

            // Receive Order
            $vendorInvoice->receive_order_id = $vendorInvoiceDTO->getReceiveOrderId();

            // Employee
            $vendorInvoice->accepted_by = $vendorInvoiceDTO->getAcceptedBy();
            $vendorInvoice->checked_by = $vendorInvoiceDTO->getCheckedBy();
            $vendorInvoice->approved_by = $vendorInvoiceDTO->getApprovedBy();

            $vendorInvoice->save();

            return $vendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

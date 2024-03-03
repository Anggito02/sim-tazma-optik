<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTOs\NewVendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class AddVendorInvoiceRepository {
    /**
     * Add Vendor Invoice
     * @param NewVendorInvoiceDTO $vendorInvoiceDto
     * @return NewVendorInvoiceDTO
     */
    public function addVendorInvoice(NewVendorInvoiceDTO $vendorInvoiceDto) {
        try {
            $newVendorInvoice = new VendorInvoice();
            $newVendorInvoice->nomor_invoice_vendor = $vendorInvoiceDto->getNomorInvoiceVendor();
            $newVendorInvoice->nomor_invoice_receive = $vendorInvoiceDto->getNomorInvoiceReceive();
            $newVendorInvoice->iterasi_pembayaran = $vendorInvoiceDto->getIterasiPembayaran();
            // $newVendorInvoice->bukti_pembayaran_1 = $vendorInvoiceDto->getBuktiPembayaran1();
            $newVendorInvoice->status_pembayaran_1 = $vendorInvoiceDto->getStatusPembayaran1();
            // $newVendorInvoice->bukti_pembayaran_2 = $vendorInvoiceDto->getBuktiPembayaran2();
            $newVendorInvoice->status_pembayaran_2 = $vendorInvoiceDto->getStatusPembayaran2();
            // $newVendorInvoice->bukti_pembayaran_3 = $vendorInvoiceDto->getBuktiPembayaran3();
            $newVendorInvoice->status_pembayaran_3 = $vendorInvoiceDto->getStatusPembayaran3();
            // $newVendorInvoice->bukti_pembayaran_4 = $vendorInvoiceDto->getBuktiPembayaran4();
            $newVendorInvoice->status_pembayaran_4 = $vendorInvoiceDto->getStatusPembayaran4();
            $newVendorInvoice->status_pembayaran = $vendorInvoiceDto->getStatusPembayaranKeseluruhan();

            // Foreign Key
            // Vendor
            $newVendorInvoice->vendor_id = $vendorInvoiceDto->getVendorId();

            // Purchase Order
            $newVendorInvoice->purchase_order_id = $vendorInvoiceDto->getPurchaseOrderId();

            // Receive Order
            $newVendorInvoice->receive_order_id = $vendorInvoiceDto->getReceiveOrderId();

            // Employee
            $newVendorInvoice->accepted_by = $vendorInvoiceDto->getAcceptedBy();
            $newVendorInvoice->checked_by = $vendorInvoiceDto->getCheckedBy();
            $newVendorInvoice->approved_by = $vendorInvoiceDto->getApprovedBy();

            $newVendorInvoice->save();

            return $newVendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

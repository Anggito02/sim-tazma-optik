<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTO;
use App\Models\Modules\VendorInvoice;

class GetAllVendorInvoiceRepository {
    /**
     * Get all vendor invoice
     * @param int $page
     * @param int $limit
     * @return VendorInvoiceDTO
     */
    public function getAllVendorInvoice(int $page, int $limit) {
        try {
            // use pagination
            $vendorInvoices = VendorInvoice::paginate($limit, ['*'], 'page', $page);

            $vendorInvoiceDTOs = [];
            foreach ($vendorInvoices as $vendorInvoice) {
                $vendorInvoiceDTO = new VendorInvoiceDTO(
                    $vendorInvoice->id,
                    $vendorInvoice->nomor_invoice_vendor,
                    $vendorInvoice->tanggal_invoice_vendor,
                    $vendorInvoice->status_pembayaran,
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
                    $vendorInvoice->vendor_id,
                    $vendorInvoice->purchase_order_id,
                    $vendorInvoice->receive_order_id,
                    $vendorInvoice->accepted_by,
                    $vendorInvoice->checked_by,
                    $vendorInvoice->approved_by
                );

                array_push($vendorInvoiceDTOs, $vendorInvoiceDTO);
            }

            return $vendorInvoiceDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

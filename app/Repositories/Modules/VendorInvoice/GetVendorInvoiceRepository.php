<?php

namespace App\Repositories\Modules\VendorInvoice;

use Exception;

use App\DTO\Modules\VendorInvoiceDTOs\VendorInvoiceInfoDTO;
use App\Models\Modules\VendorInvoice;

class GetVendorInvoiceRepository {
    /**
     * Get Vendor Invoice
     * @param int $id
     * @return VendorInvoiceInfoDTO
     */
    public function getVendorInvoice(int $id) {
        try {
            // use pagination
            $vendorInvoice = VendorInvoice::where('id', $id)
            ->join('users as accepted_by', 'accepted_by.id', '=', 'vendor_invoices.accepted_by')
            ->join('users as checked_by', 'checked_by.id', '=', 'vendor_invoices.checked_by')
            ->join('users as approved_by', 'approved_by.id', '=', 'vendor_invoices.approved_by')
            ->select(
                'vendor_invoices.*',
                'accepted_by.employee_name as accepted_by_name',
                'checked_by.employee_name as checked_by_name',
                'approved_by.employee_name as approved_by_name'
            )
            ->first();

            $vendorInvoiceDTO = new VendorInvoiceInfoDTO(
                $vendorInvoice->id,
                $vendorInvoice->nomor_invoice_vendor,
                $vendorInvoice->nomor_invoice_receive,
                $vendorInvoice->iterasi_pembayaran,
                // $vendorInvoice->bukti_pembayaran_1,
                $vendorInvoice->status_pembayaran_1,
                // $vendorInvoice->bukti_pembayaran_2,
                $vendorInvoice->status_pembayaran_2,
                // $vendorInvoice->bukti_pembayaran_3,
                $vendorInvoice->status_pembayaran_3,
                // $vendorInvoice->bukti_pembayaran_4,
                $vendorInvoice->status_pembayaran_4,
                $vendorInvoice->status_pembayaran,
                $vendorInvoice->vendor_id,
                $vendorInvoice->purchase_order_id,
                $vendorInvoice->receive_order_id,
                $vendorInvoice->accepted_by,
                $vendorInvoice->checked_by,
                $vendorInvoice->approved_by,
                $vendorInvoice->accepted_by_name,
                $vendorInvoice->checked_by_name,
                $vendorInvoice->approved_by_name
            );
            return $vendorInvoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

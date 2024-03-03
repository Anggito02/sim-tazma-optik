<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\VendorInvoiceDTOs\NewVendorInvoiceDTO;

use App\Repositories\Modules\VendorInvoice\AddVendorInvoiceRepository;
use App\Services\Modules\VendorInvoice\GenerateInvoiceNumberService;

class AddVendorInvoiceService {
    public function __construct(
        private AddVendorInvoiceRepository $vendorInvoiceRepository,
        private GenerateInvoiceNumberService $generateInvoiceNumberService
    ) {}

    /**
     * Add Vendor Invoice
     * @param Request $request
     * @return VendorInvoice
     */
    public function addVendorInvoice(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nomor_invoice_receive' => 'required',
                'iterasi_pembayaran' => 'required|in:1,2,3,4',
                // 'bukti_pembayaran_1' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'status_pembayaran_1' => 'required|boolean',
                // 'bukti_pembayaran_2' => 'required_if:iterasi_pembayaran,2,3,4',
                'status_pembayaran_2' => 'required_if:iterasi_pembayaran,2,3,4|boolean',
                // 'bukti_pembayaran_3' => 'required_if:iterasi_pembayaran,3,4',
                'status_pembayaran_3' => 'required_if:iterasi_pembayaran,3,4|boolean',
                // 'bukti_pembayaran_4' => 'required_if:iterasi_pembayaran,4',
                'status_pembayaran_4' => 'required_if:iterasi_pembayaran,4|boolean',
                'status_pembayaran_keseluruhan' => 'required|in:lunas,belum_lunas',

                // Foreign Key
                // Vendor
                'vendor_id' => 'required|exists:vendors,id',

                // Purchase Order
                'purchase_order_id' => 'required|exists:purchase_orders,id',

                // Receive Order
                'receive_order_id' => 'required|exists:receive_orders,id',

                // Employee
                'accepted_by' => 'required|exists:users,id',
                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
            ]);

            $nomor_invoice_vendor = $this->generateInvoiceNumberService->generateInvoiceNumber($request->vendor_id);

            $vendorInvoiceDTO = new NewVendorInvoiceDTO(
                $nomor_invoice_vendor,
                $request->nomor_invoice_receive,
                $request->iterasi_pembayaran,
                // $request->bukti_pembayaran_1,
                $request->status_pembayaran_1,
                // $request->bukti_pembayaran_2,
                $request->status_pembayaran_2,
                // $request->bukti_pembayaran_3,
                $request->status_pembayaran_3,
                // $request->bukti_pembayaran_4,
                $request->status_pembayaran_4,
                $request->status_pembayaran_keseluruhan,

                // Foreign Key
                // Vendor
                $request->vendor_id,

                // Purchase Order
                $request->purchase_order_id,

                // Receive Order
                $request->receive_order_id,

                // Employee
                $request->accepted_by,
                $request->checked_by,
                $request->approved_by,
            );

            $newVendorInvoice = $this->vendorInvoiceRepository->addVendorInvoice($vendorInvoiceDTO);

            return $newVendorInvoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

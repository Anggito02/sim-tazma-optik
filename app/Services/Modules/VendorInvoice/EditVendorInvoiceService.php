<?php

namespace App\Services\Modules\VendorInvoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\VendorInvoiceDTOs\UpdateVendorInvoiceDTO;

use App\Repositories\Modules\VendorInvoice\EditVendorInvoiceRepository;

class EditVendorInvoiceService {
    public function __construct(
        private EditVendorInvoiceRepository $vendorInvoiceRepository
    ) {}

    /**
     * Edit Vendor Invoice
     * @param Request $request
     * @return VendorInvoice
     */
    public function editVendorInvoice(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required',
                'iterasi_pembayaran' => 'required|in:1,2,3,4',
                'status_pembayaran_1' => 'required|boolean',
                'status_pembayaran_2' => 'required_if:iterasi_pembayaran,2,3,4|boolean',
                'status_pembayaran_3' => 'required_if:iterasi_pembayaran,3,4|boolean',
                'status_pembayaran_4' => 'required_if:iterasi_pembayaran,4|boolean',
                'status_pembayaran_keseluruhan' => 'required|in:lunas,belum_lunas',
            ]);

            $vendorInvoiceDTO = new UpdateVendorInvoiceDTO(
                $request->id,
                $request->status_pembayaran_1,
                $request->status_pembayaran_2,
                $request->status_pembayaran_3,
                $request->status_pembayaran_4,
                $request->status_pembayaran_keseluruhan,
            );

            $vendorInvoiceDTO = $this->vendorInvoiceRepository->editVendorInvoice($vendorInvoiceDTO);

            return $vendorInvoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

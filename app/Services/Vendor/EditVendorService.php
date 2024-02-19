<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\EditVendorRepository;

class EditVendorService {
    public function __construct(
        private EditVendorRepository $vendorRepository
    ) {}

    /**
     * Edit vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function editVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:vendors,id',
                'kode_vendor' => 'required',
                'npwp_vendor' => 'required',
                'nama_vendor' => 'required',
                'alamat_vendor' => 'required',
                'init_date_supply' => 'required',
                'last_date_supply' => 'required',
                'pic_vendor' => 'required',
                'no_telp_vendor' => 'required',
                'no_telp_pic' => 'required',
                'status_blacklist' => 'required',
            ]);

            $vendorDTO = new VendorDTO(
                $request->id,
                $request->kode_vendor,
                $request->npwp_vendor,
                $request->nama_vendor,
                $request->alamat_vendor,
                $request->init_date_supply,
                $request->last_date_supply,
                $request->pic_vendor,
                $request->no_telp_vendor,
                $request->no_telp_pic,
                $request->status_blacklist,
            );

            $vendorDTO = $this->vendorRepository->editVendor($vendorDTO);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

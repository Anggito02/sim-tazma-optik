<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\AddVendorRepository;

class AddVendorService {
    public function __construct(
        private AddVendorRepository $addVendorRepository
    ) {}

    /**
     * Add vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function addVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'kode_vendor' => 'required|unique:vendor,kode_vendor',
                'npwp_vendor' => 'required|unique:vendor,npwp_vendor',
                'nama_vendor' => 'required|unique:vendor,nama_vendor',
                'alamat_vendor' => 'required',
                'init_date_supply' => 'required',
                'pic_vendor' => 'required',
                'no_telepon_vendor' => 'required|unique:vendor,no_telepon_vendor',
                'no_telepon_pic' => 'required',
            ]);

            $vendorDTO = new VendorDTO(
                null,
                $request->kode_vendor,
                $request->npwp_vendor,
                $request->nama_vendor,
                $request->alamat_vendor,
                $request->init_date_supply,
                null,
                $request->pic_vendor,
                $request->no_telepon_vendor,
                $request->no_telepon_pic,
                null,
            );

            $vendorDTO = $this->addVendorRepository->addVendor($vendorDTO);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

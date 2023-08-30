<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class GetVendorRepository {
    /**
     * Get vendor
     * @param int $id
     * @return VendorDTO
     */
    public function getVendor(int $id) {

        try {
            $vendor = Vendor::find($id);

            $vendorDTO = new VendorDTO(
                $vendor->id,
                $vendor->kode_vendor,
                $vendor->npwp_vendor,
                $vendor->nama_vendor,
                $vendor->alamat_vendor,
                $vendor->init_date_supply,
                $vendor->last_date_supply,
                $vendor->pic_vendor,
                $vendor->no_telp_vendor,
                $vendor->no_telp_pic,
                $vendor->status_blacklist,
            );

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

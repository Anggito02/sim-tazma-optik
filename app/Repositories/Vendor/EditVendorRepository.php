<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class EditVendorRepository {
    /**
     * Edit vendor
     * @param VendorDTO $vendorDTO
     * @return VendorDTO
     */
    public function editVendor(VendorDTO $vendorDTO) {
        try {
            $vendor = Vendor::find($vendorDTO->id);
            $vendor->kode_vendor = $vendorDTO->kode_vendor;
            $vendor->npwp_vendor = $vendorDTO->npwp_vendor;
            $vendor->nama_vendor = $vendorDTO->nama_vendor;
            $vendor->alamat_vendor = $vendorDTO->alamat_vendor;
            $vendor->init_date_supply = $vendorDTO->init_date_supply;
            $vendor->last_date_supply = $vendorDTO->last_date_supply;
            $vendor->pic_vendor = $vendorDTO->pic_vendor;
            $vendor->no_telp_vendor = $vendorDTO->no_telp_vendor;
            $vendor->no_telp_pic = $vendorDTO->no_telp_pic;
            $vendor->status_blacklist = $vendorDTO->status_blacklist;
            $vendor->save();

            return $vendor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

}

?>

<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class AddVendorRepository {
    /**
     * Add vendor
     * @param VendorDTO $vendorDTO
     * @return VendorDTO
     */
    public function addVendor(VendorDTO $vendorDTO) {
        try {
            $newVendor = new Vendor();
            $newVendor->kode_vendor = $vendorDTO->kode_vendor;
            $newVendor->npwp_vendor = $vendorDTO->npwp_vendor;
            $newVendor->nama_vendor = $vendorDTO->nama_vendor;
            $newVendor->alamat_vendor = $vendorDTO->alamat_vendor;
            $newVendor->init_date_supply = $vendorDTO->init_date_supply;
            $newVendor->last_date_supply = $vendorDTO->last_date_supply;
            $newVendor->pic_vendor = $vendorDTO->pic_vendor;
            $newVendor->no_telp_vendor = $vendorDTO->no_telp_vendor;
            $newVendor->no_telp_pic = $vendorDTO->no_telp_pic;
            $newVendor->status_blacklist = $vendorDTO->status_blacklist;
            $newVendor->save();

            return $newVendor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

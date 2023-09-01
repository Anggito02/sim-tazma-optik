<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class GetAllVendorRepository {
    // use pagination
    public function getAllVendor(int $page, int $limit) {
        try {
            $vendors = Vendor::paginate($limit, ['*'], 'page', $page);

            $vendorDTOs = [];
            foreach ($vendors as $vendor) {
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

                array_push($vendorDTOs, $vendorDTO);
            }

            return $vendorDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

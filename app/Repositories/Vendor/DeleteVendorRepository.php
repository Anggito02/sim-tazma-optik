<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class DeleteVendorRepository {
    /**
     * Delete vendor
     * @param int $id
     * @return VendorDTO
     */
    public function deleteVendor(int $id) {
        try {
            $vendor = Vendor::find($id);
            $vendor->delete();

            return $vendor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\DeleteVendorRepository;

class DeleteVendorService {
    public function __construct(
        private DeleteVendorRepository $vendorRepository
    ) {}

    /**
     * Delete vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function deleteVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:vendors,id',
            ]);

            $id = $request->id;

            $vendorDTO = $this->vendorRepository->deleteVendor($id);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

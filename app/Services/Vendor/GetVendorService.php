<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\GetVendorRepository;

class GetVendorService {
    public function __construct(
        private GetVendorRepository $vendorRepository
    ) {}

    /**
     * Get vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function getVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:vendors,id',
            ]);

            $id = $request->id;

            $vendorDTO = $this->vendorRepository->getVendor($id);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

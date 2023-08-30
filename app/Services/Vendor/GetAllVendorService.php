<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\GetAllVendorRepository;

class GetAllVendorService {
    public function __construct(
        private GetAllVendorRepository $vendorRepository
    ) {}

    /**
     * Get all vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function getAllVendor(Request $request) {
        try {
            $request->validate([
                'page' => 'required',
                'limit' => 'required',
            ]);

            $vendorDTO = $this->vendorRepository->getAllVendor($request->page, $request->limit);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

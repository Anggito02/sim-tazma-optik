<?php

namespace App\Services\Brand;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BrandDTO;

use App\Repositories\Brand\GetAllBrandRepository;

class GetAllBrandService {
    public function __construct(
        private GetAllBrandRepository $brandRepository
    ) {}

    /**
     * Get all brand
     * @return BrandDTO
     */
    public function getAllBrand(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $brandDTO = $this->brandRepository->getAllBrand($request->page, $request->limit);

            return $brandDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

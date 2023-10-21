<?php

namespace App\Services\Brand;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BrandDTO;

use App\Repositories\Brand\GetBrandRepository;

class GetBrandService {
    public function __construct(
        private GetBrandRepository $brandRepository
    ) {}

    /**
     * Get brand
     * @param Request $request
     * @return BrandDTO
     */
    public function getBrand(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:brands,id',
            ]);

            $id = $request->id;

            $brandDTO = $this->brandRepository->getBrand($id);

            return $brandDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Services\Brand;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BrandDTO;

use App\Repositories\Brand\DeleteBrandRepository;

class DeleteBrandService {
    public function __construct(
        private DeleteBrandRepository $brandRepository
    ) {}

    /**
     * Delete brand
     * @param Request $request
     * @return BrandDTO
     */
    public function deleteBrand(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:brands,id',
            ]);

            $id = $request->id;

            $brandDTO = $this->brandRepository->deleteBrand($id);

            return $brandDTO;

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

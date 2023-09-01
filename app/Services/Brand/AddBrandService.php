<?php

namespace App\Services\Brand;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BrandDTO;

use App\Repositories\Brand\AddBrandRepository;

class AddBrandService {
    public function __construct(
        private AddBrandRepository $brandRepository
    ) {}

    /**
     * Add brand
     * @param Request $request
     * @return BrandDTO
     */
    public function addBrand(Request $request) {
        try {
            // Validate request
            $request->validate([
                'nama_brand' => 'required',
                'deskripsi' => 'required',
            ]);

            $brandDTO = new BrandDTO(
                null,
                $request->nama_brand,
                $request->deskripsi,
            );

            $brandDTO = $this->brandRepository->addBrand($brandDTO);

            return $brandDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

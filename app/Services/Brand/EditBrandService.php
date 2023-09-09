<?php

namespace App\Services\Brand;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BrandDTO;

use App\Repositories\Brand\EditBrandRepository;

class EditBrandService {
    public function __construct(
        private EditBrandRepository $brandRepository
    ) {}

    /**
     * Edit brand
     * @param Request $request
     * @return BrandDTO
     */
    public function editBrand(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:brands,id',
                'nama_brand' => 'required',
                'deskripsi' => 'required',
            ]);

            $brandDTO = new BrandDTO(
                $request->id,
                $request->nama_brand,
                $request->deskripsi,
            );

            $brandDTO = $this->brandRepository->editBrand($brandDTO);

            return $brandDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

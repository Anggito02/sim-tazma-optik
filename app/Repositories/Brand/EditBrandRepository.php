<?php

namespace App\Repositories\Brand;

use Exception;

use App\DTO\BrandDTO;
use App\Models\Brand;

class EditBrandRepository {
    /**
     * Edit brand
     * @param BrandDTO $brandDTO
     * @return BrandDTO
     */
    public function editBrand(BrandDTO $brandDTO) {
        try {
            $brand = Brand::find($brandDTO->id);
            $brand->nama_brand = $brandDTO->nama_brand;
            $brand->deskripsi = $brandDTO->deskripsi;
            $brand->save();

            return $brand;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace  App\Repositories\Brand;

use Exception;

use App\DTO\BrandDTO;
use App\Models\Brand;

class AddBrandRepository {
    /**
     * Add brand
     * @param BrandDTO $brandDTO
     * @return BrandDTO
     */
    public function addBrand(BrandDTO $brandDTO) {
        try {
            $newBrand = new Brand();
            $newBrand->nama_brand = $brandDTO->nama_brand;
            $newBrand->deskripsi = $brandDTO->deskripsi;
            $newBrand->save();

            return $newBrand;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

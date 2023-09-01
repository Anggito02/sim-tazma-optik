<?php

namespace App\Repositories\Brand;

use Exception;

use App\DTO\BrandDTO;
use App\Models\Brand;

class GetBrandRepository {
    /**
     * Get brand
     * @param BrandDTO $brandDTO
     * @return BrandDTO
     */
    public function getBrand(int $id) {
        try {
            $brand = Brand::find($id);

            return $brand;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

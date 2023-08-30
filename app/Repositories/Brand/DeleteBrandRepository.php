<?php

namespace App\Repositories\Brand;

use Exception;

use App\DTO\BrandDTO;
use App\Models\Brand;

class DeleteBrandRepository {
    /**
     * Delete brand
     * @param BrandDTO $brandDTO
     * @return BrandDTO
     */
    public function deleteBrand(int $id) {
        try {
            $brand = Brand::find($id);
            $brand->delete();

            return $brand;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

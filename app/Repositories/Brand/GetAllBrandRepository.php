<?php

namespace App\Repositories\Brand;

use Exception;

use App\DTO\BrandDTO;
use App\Models\Brand;

class GetAllBrandRepository {
    /**
     * Get all brand
     * @return BrandDTO
     */
    public function getAllBrand(int $page, int $limit) {
        try {
            // use pagination
            $brands = Brand::paginate($limit, ['*'], 'page', $page);

            $brandDTOs = [];
            foreach ($brands as $brand) {
                $brandDTO = new BrandDTO(
                    $brand->id,
                    $brand->nama_brand,
                    $brand->deskripsi,
                );

                array_push($brandDTOs, $brandDTO);
            }

            return $brandDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

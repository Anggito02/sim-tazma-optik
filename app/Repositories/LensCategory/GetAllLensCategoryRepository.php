<?php

namespace App\Repositories\LensCategory;

use Exception;

use App\DTO\LensCategoryDTO;
use App\Models\LensCategory;

class GetAllLensCategoryRepository {
    /**
     * Get all lens category
     * @param int $page
     * @param int $limit
     * @return LensCategoryDTO
     */
    public function getAllLensCategory(int $page, int $limit) {
        try {
            $lensCategories = LensCategory::paginate($limit, ['*'], 'page', $page);

            $lensCategoryDTOs = [];

            foreach ($lensCategories as $lensCategory) {
                $lensCategoryDTO = new LensCategoryDTO(
                    $lensCategory->id,
                    $lensCategory->nama_kategori
                );

                array_push($lensCategoryDTOs, $lensCategoryDTO);
            }

            return $lensCategoryDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

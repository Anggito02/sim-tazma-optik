<?php

namespace App\Repositories\LensCategory;

use Exception;

use App\DTO\LensCategoryDTO;
use App\Models\LensCategory;

class AddLensCategoryRepository {
    /**
     * Add lens category
     * @param LensCategoryDTO $lensCategoryDTO
     * @return LensCategoryDTO
     */
    public function addLensCategory(LensCategoryDTO $lensCategoryDTO) {
        try {
            $lensCategory = new LensCategory();
            $lensCategory->nama_kategori = $lensCategoryDTO->nama_kategori;
            $lensCategory->save();

            return $lensCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

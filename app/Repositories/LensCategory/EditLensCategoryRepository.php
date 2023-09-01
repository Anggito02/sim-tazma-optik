<?php

namespace App\Repositories\LensCategory;

use Exception;

use App\DTO\LensCategoryDTO;
use App\Models\LensCategory;

class EditLensCategoryRepository {
    /**
     * Edit lens category
     * @param LensCategoryDTO $lensCategoryDTO
     * @return LensCategoryDTO
     */
    public function editLensCategory(LensCategoryDTO $lensCategoryDTO) {
        try {
            $lensCategory = LensCategory::find($lensCategoryDTO->id);
            $lensCategory->nama_kategori = $lensCategoryDTO->nama_kategori;
            $lensCategory->save();

            return $lensCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
?>

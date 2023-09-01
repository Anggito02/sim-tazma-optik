<?php

namespace App\Repositories\LensCategory;

use Exception;

use App\DTO\LensCategoryDTO;
use App\Models\LensCategory;

class GetLensCategoryRepository {
    /**
     * Get lens category by id
     * @param int $id
     * @return LensCategoryDTO
     */
    public function getLensCategory(int $id) {
        try {
            $lensCategory = LensCategory::find($id);

            $lensCategoryDTO = new LensCategoryDTO(
                $lensCategory->id,
                $lensCategory->nama_kategori
            );

            return $lensCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\LensCategory;

use Exception;

use App\DTO\LensCategoryDTO;
use App\Models\LensCategory;

class DeleteLensCategoryRepository {
    /**
     * Delete lens category
     * @param int $id
     * @return LensCategoryDTO
     */
    public function deleteLensCategory(int $id) {
        try {
            $lensCategory = LensCategory::find($id);
            $lensCategory->delete();

            return $lensCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>

<?php

namespace App\Repositories\FrameCategory;

use Exception;

use App\DTO\FrameCategoryDTO;
use App\Models\FrameCategory;

class DeleteFrameCategoryRepository {
    /**
     * Delete frame category
     * @param int $id
     * @return FrameCategoryDTO
     */
    public function deleteFrameCategory(int $id) {
        try {
            $frameCategory = FrameCategory::find($id);
            $frameCategory->delete();

            return $frameCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
